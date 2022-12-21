<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Order;

class AdminController extends Controller
{
    public function user()
    {
        $data=user::all();
        return view("admin.users",compact("data"));
    }
    public function deleteuser($id)
    {
        $data=user::find($id);
        $data->delete();
        return redirect() ->back();
    }

    public function deletemenu($id)
    {
        $data=food::find($id);
        $data->delete();
        return redirect() ->back();
    }
    public function foodmenu()
    {
        $data = food::all();
        return view("admin.foodmenu",compact("data"));
    }
    public function upload(Request $request)
    {
        $data = new food;

        $image = $request ->image;
        $imagename= time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->save();
         return redirect()->back();
    }
    public function orders()
    {
        $data=order::all();
        return view('admin.orders',compact('data'));

    }
    public function updatemenu($id)
    {
        $data=food::find($id);
        return view("admin.updatemenu",compact('data'));
    }
    public function update(Request $request,$id)
    {
        $data=food::find($id);

        $image = $request ->image;
        $imagename= time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->save();
         return redirect()->back();
    }
    public function search(Request $request)
    {
        $search=$request->search;
        $data=order::where('name','Like','%'.$search.'%')->get();
        return view('admin.orders',compact('data'));

    }
}
