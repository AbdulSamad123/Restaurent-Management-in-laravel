<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\restaurent;

class RestoController extends Controller
{
    function index()
    {
        return view('home ');
    }

    function list()
    {
        $data = restaurent::all();
        return view('list',["data"=>$data]);
    }
    function add(Request $req)
    {
        //return $req->input();
        $resto = new restaurent;
        $resto->name=$req->input('name');
        $resto->email=$req->input('email');
        $resto->address=$req->input('address');
        $resto->save();
        $req->session()->flash('status','Restaurent added Successfully');
        return redirect('list');
    }
    function delete($id)
    {
        restaurent::find($id)->delete();
        Session::flash('status','Restaurent has deleted Successfully');
        return redirect('list');

    }
    function edit($id)
    {
        $data = restaurent::find($id);
        return view('edit',['data'=>$data]);
    }
}
