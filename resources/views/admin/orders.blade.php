<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include("admin.admincss");
  </head>
  <body>
   
  <div class="container-scroller">
  @include("admin.navbar");
  <div class="container">
  <h1>Customer Orders</h1>

  <form action="{{url('/search')}}" method="get">
    @csrf
    <input type="text" name="search" style="color:blue;">
    <input type="submit" value="Search" class="btn btn-success">
</form>
  <table>
    <tr align="center">
        <td style="padding: 20px">Name</td>
        <td style="padding: 20px">Phone</td>
        <td style="padding: 20px">Address</td>
        <td style="padding: 20px">FoodName</td>
        <td style="padding: 20px">Price</td>
        <td style="padding: 20px">Quantity</td>
        <td style="padding: 20px">Total Price</td>
</tr>
  
  @foreach($data as $data)
  <tr align="center" style="background-color: grey;">
    <td style="padding: 20px">{{$data->name}}</td>
    <td style="padding: 20px">{{$data->phone}}</td>
    <td style="padding: 20px">{{$data->address}}</td>
    <td style="padding: 20px">{{$data->foodname}}</td>
    <td style="padding: 20px">Tk{{$data->price}}</td>
    <td style="padding: 20px">{{$data->quantity}}</td>
    <td style="padding: 20px">Tk{{$data->price * $data->quantity}}</td>

</tr>
@endforeach
</table>
</div>
</div>
  @include("admin.adminscript");    
    
  </body>
</html>