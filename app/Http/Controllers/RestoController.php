<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\restaurent;
use Session;
use App\user;
use Crypt;

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
    function update(Request $req)
    {
        //return $req->input();
        $resto = restaurent::find($req->input('id'));
        $resto->name=$req->input('name');
        $resto->email=$req->input('email');
        $resto->address=$req->input('address');
        $resto->save();
        $req->session()->flash('status','Restaurent Updated Successfully');
        return redirect('list');
    }
    function register(Request $req)
    {
        $user= new user;
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password=Crypt::encrypt($req->input('password'));
        $user->save();
        $req->session()->put('status',$req->input('name'));
        return redirect('/');
    }
}
