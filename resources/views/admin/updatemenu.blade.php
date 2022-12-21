<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    @include("admin.admincss");
  </head>
  <body>
   
  <div class="container-scroller">
  @include("admin.navbar");
  <div style="position: relative; top: 60px; right: -150px">
<form action="{{url('/update',$data->id)}}" method="post" enctype="multipart/form-data">
    @csrf

<div>
    <label>Title</label>
    <input style="color: red;" type="text" name="title" value="{{$data->title}}" required>
</div>
<div>
    <label>Price</label>
    <input style="color: red;" type="num" name="price" value="{{$data->price}}" required>
</div>
<div>
    <label>old Image</label>
    <img height="200" width="200" src="/foodimage/{{$data->image}}">
</div>

<div>
    <label>New Image</label>
    <input type="file" name="image" required>
</div>

<div>
    <input style="color:grey" type="submit" value="Save">
</div>

</form>


<div>
</div>
  @include("admin.adminscript");    
    
  </body>
</html>