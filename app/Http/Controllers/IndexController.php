<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function index(){
        return view('home.index');
    }

    public function login(){
        return view('home.login');
    }

    public function register()
    {
        return view('home.register');
    }

    public function postLogin(Request  $res)
    {
        $email = $res->input('email');
        $password = $res->input('password');

        if(Auth::attempt(['email' => $email, 'password' => $password, 'role_id' => 1])){
            return redirect()->route('voyager.dashboard');
        }elseif (Auth::attempt(['email' => $email, 'password' => $password, 'role_id' => 2])){
            return redirect()->route('/');
        }else{
            return redirect()->back()->with('message', 'Email hoặc mật khẩu của bạn không đúng!');
        }

    }

    public function contact()
    {
        return view('home.contact');
    }

    public function viewProduct()
    {
        return view('home.view_product');
    }

    public function listProduct()
    {
        return view('home.list_product');
    }

    public function  shoppingCart(){
        return view('home.shopping_cart');
    }

}
