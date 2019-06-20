@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($products) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Products</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <th>{{ $product->name_zh }}</th>
                                        <th><a href="/products/{{ $product->id }}/edit" class="btn btn-primary">Edit</a></th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>You have no product</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
