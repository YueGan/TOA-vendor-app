<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\Storage;
use DB;

class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('status', 0)->with('products')->orderBy('id', 'asc')->paginate(10);
        $status = "新订单";
        return view('orders.index', compact('orders', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $products = Product::whereNull('deleted_at')->get();
        // data_fill($products, 'amount', 0);
        // dd($products);
        return view('orders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $in_products = json_decode(json_encode($request->except('_token')), true);
        $db_products = json_decode(json_encode(Product::whereIn('id', array_keys($in_products))->get()), true);
        $total = 0;
        $to_insert_product = [];

        foreach ($in_products as $in_key => $in_value) {
            if($in_value == 0)
                continue;
            $db_prod = array_where($db_products, function($value, $key) use ($in_key){
                return $value['id'] == $in_key;
            });
            $total += $in_value * reset($db_prod)['price'];
            array_push($to_insert_product, ['product_id' => $in_key, 'amount' => $in_value, 'unit_price' => reset($db_prod)['price']]);
        }
        
        $order = new Order;
        $order->total = $total;
        $order->status = 0;

        $order->save();


        data_fill($to_insert_product, '*.order_id', $order->id);
        DB::table('order_product')
        ->insert($to_insert_product);

        return redirect('/orders/create')->with('success', '订单创建成功，号码' . $order->id );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function toComplete($id){
        $order = Order::find($id);
        $order->status = 1;
        $order->save();

        return redirect('/orders')->with('success', '订单已完成');
    }

    public function toArchive($id){
        $order = Order::find($id);
        $order->status = 2;
        $order->save();

        return redirect('/orders')->with('success', '订单已删除');
    }

    public function toNew($id){
        $order = Order::find($id);
        $order->status = 0;
        $order->save();

        return redirect('/orders')->with('success', '订单变回新订单');
    }
}
