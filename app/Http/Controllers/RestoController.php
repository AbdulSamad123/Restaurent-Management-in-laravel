<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\restaurent;
use Session;
use App\User;
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
        $user= new User;
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password=Crypt::encrypt($req->input('password'));
        $user->save();
        $req->session()->put('user',$req->input('name'));
        return redirect('/');
    }
    function login(Request $req)
    {
        $user = User::where("email",$req->input('email'))->get();
        if(Crypt::decrypt($user[0]->password)==$req->input('password'))
        {
            $req->session()->put('user', $user[0]->name);
            return redirect('/');
        }
        //  return Crypt::decrypt($user[0]->password)==$req->input('password');

    }
}
