<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Like;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use validate;
use TCG\Voyager\Models\User;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Session;
use App\Giohang;

class IndexController extends Controller
{

    public function index(){
        $product = DB::table('products')->take(5)->get();
        $prominence_product = DB::table('products')->skip(5)->take(8)->get();
        return view('home.index')->with([
            'product' => $product,
            'prominence_product' => $prominence_product
        ]);
    }

    public function login(){
        return view('home.login');
    }

    public function register()
    {
        return view('home.register');
    }

    public function checkRegister(Request $request){
        $this->validate($request,
            [
                'email' => 'required|unique:users,email',
                'fullname' => 'required',
                'username' => 'required|unique:users,username',
                'phone' => 'required',
                'password' => 'required',
                're_password' => 'required',
                'birthday' => 'required',
                'address' => 'required'
            ],[
                'email.unique' => 'Email đã tồn tại',
                'email.required' => 'Vui lòng nhập email',
                'fullname.required' => 'Vui lòng nhập họ tên',
                'username.required' => 'Vui lòng nhập tên tài khoản',
                'username.unique' => 'Tên tài khoản đã tồn tại',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'password.required' => 'Vui lòng nhập mật khẩu',
                're_password.required' => 'Vui lòng xác nhận mật khẩu',
                'birthday.required' => 'Vui lòng nhập ngày sinh',
                'address.required' => 'Vui lòng nhập địa chỉ'
            ]);

        $password = $request->input('password');
        $re_password = $request->input('re_password');

        $user = new User;

        $level = DB::table('roles')->where('name', 'user')->get();
        foreach($level as $val){
            $level_member = $val->id;
        }

        if($password == $re_password){
            $user->role_id = $level_member;

            $user->name = $request->input('fullname');
            $user->username = $request->input('username');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');
            $user->birthday = $request->input('birthday');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            $register_success = Session::get('register_success');
            Session::put('register_success');

            return redirect()->route('login')->with('register_success','Đã đăng ký tài khoản thành công');
        }else{
            return redirect()->back()->with('message','Mật khẩu xác nhận không đúng');
        }

    }

    public function postLogin(Request  $res)
    {
        $email = $res->input('email');
        $password = $res->input('password');

        if(Auth::attempt(['email' => $email, 'password' => $password, 'role_id' => 1])){
            return redirect()->route('voyager.dashboard');
        }elseif (Auth::attempt(['email' => $email, 'password' => $password, 'role_id' => 2])){
            return redirect()->route('home');
        }else{
            return redirect()->back()->with('message', 'Email hoặc mật khẩu của bạn không đúng!');
        }

    }

    public function contact()
    {
        return view('home.contact');
    }

    public function viewProduct($id){
        $product = DB::table('products')->where('id', $id)->get();
        $image = DB::table('images')->where('product_id', $id)->get();
        $detail = DB::table('product_details')->where('product_id', $id)->get();
        $comments = DB::table('comments')->where('product_id', $id)->latest()->take(5)->get();
        return view('home.view_product')->with([
            'product' => $product,
            'image' => $image,
            'detail' => $detail,
            'comments' => $comments
        ]);

    }

    public function listProduct()
    {
        return view('home.list_product');
    }

    public function  shoppingCart(){
        return view('home.shopping_cart');
    }

    public function checkout(){
        return view('home.checkout');
    }

    public function new(){
        return view('home.news');
    }

    public function newDetail(){
        return view('home.new_detail');
    }

    public function addCart($id, Request $request){

        $product = Product::find($id);

        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Giohang($oldCart);

        $cart->add($product, $id);

        $request->session()->put('cart', $cart);

        $add_cart_success = Session::get('add_cart_success');
        Session::put('add_cart_success');

        return redirect()->back()->with('add_cart_success', 'Đã thêm vào giỏ hàng');

    }

    public function addCartWithQuantity(Request $request){

        $id = $request->id;
        $quantity = $request->quantity;

        $product = Product::find($id);

        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Giohang($oldCart);
        $cart->add($product, $id, $quantity);

        $request->session()->put('cart', $cart);

        $add_cart_success = Session::get('add_cart_success');
        Session::put('add_cart_success');

        return redirect()->back()->with('add_cart_success', '');

    }

    public function getUpdateCart(Request $request){
        if($request->id and $request->quantity){
            $oldCart = Session::has('cart')?Session::get('cart'):null;
            $cart = new Giohang($oldCart);
            $cart->update_cart($request->id,$request->quantity);
            session()->put('cart', $cart);
        }
    }

    public function getDeleteCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Giohang($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        $delete_cart = Session::get('delete_cart');
        Session::put('delete_cart');

        return redirect()->back()->with('delete_cart', '');
    }

    public function likeProduct($productId, $userId){
        $like = new Like;
        $like->user_id = $userId;
        $like->product_id = $productId;
        $like->save();

        $likeProduct = Session::get('likeProduct');
        Session::put('likeProduct');

        return redirect()->back()->with('likeProduct','');
    }

    public function comment($productId, $userId, Request $request){
        $comment = new Comment;
        $comment->product_id = $productId;
        $comment->user_id = $userId;
        $comment->description = $request->input('comment');
        $comment->save();

        $commentProduct = Session::get('commentProduct');
        Session::put('commentProduct');

        return redirect()->back()->with('commentProduct','');
    }

}
