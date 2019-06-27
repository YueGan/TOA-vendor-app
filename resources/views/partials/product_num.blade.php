<div class="form-group">
    <img name="{{ $id }}" src="/storage/icons/minus.svg" id="down" href="#" onclick="updateSpinner(this);" style="width:30px"></img>
    <input name="{{ $id }}" id="{{ "content" . $id }}" value=0 type="text" style="width:30px" />
    <img name="{{ $id }}" src="/storage/icons/add.svg" id="up" href="#"  onclick="updateSpinner(this);" style="width:30px"></img>
	{{ Form::label($id, $name_zh, ['class' => 'control-label']) }}
	$ {{ $price }}
</div>

<style>
a
{
    text-decoration: none;
}
</style>

<script>
function second(obj){

}
function updateSpinner(obj)
{
    var contentObj = document.getElementById("content" + obj.name);
    console.log(obj.name)
    var value = parseInt(contentObj.value);
    if(obj.id == "down") {
        value = Math.max(value-1, 0);
    } else {
        value++;
    }
    contentObj.value = value;
}
</script>