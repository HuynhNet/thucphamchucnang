<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Customer;
use App\Like;
use App\Order;
use App\OrderDetail;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use validate;
use TCG\Voyager\Models\User;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Session;
use App\Giohang;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class IndexController extends Controller
{

    public function index(){
        $product = DB::table('products')
            ->where('promotion_price', '=', null)->take(5)->get();
        $prominence_product = DB::table('products')
            ->where('promotion_price', '=', null)->skip(5)->take(8)->get();
        $promotion_product = DB::table('products')
            ->where('promotion_price', '<>', null)->take(8)->get();
        return view('home.index')->with([
            'product' => $product,
            'prominence_product' => $prominence_product,
            'promotion_products' => $promotion_product
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

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
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
        $loais = DB::table('categories')->get();
        $khuyenMais = DB::table('products')->take(6)->get();
        $allProducts = DB::table('products')->paginate(9);
        $sum = DB::table('products')->count();
        return view('home.list_product')->with([
            'loais' => $loais,
            'khuyenMais' => $khuyenMais,
            'allProducts' => $allProducts,
            'sum' => $sum
        ]);
    }

    public function categoryByName($id, $name){
        $loais = DB::table('categories')->get();
        $khuyenMais = DB::table('products')->take(6)->get();
        $allProducts = DB::table('products')->where('category_id', $id)->paginate(9);
        $sum = DB::table('products')->where('category_id', $id)->count();

        return view('home.list_product')->with([
            'loais' => $loais,
            'khuyenMais' => $khuyenMais,
            'allProducts' => $allProducts,
            'sum' => $sum
        ]);
    }

    public function  shoppingCart(){
        return view('home.shopping_cart');
    }

    public function checkout(){
        return view('home.checkout');
    }

    public function checkoutArea(){
        return view('home.checkout_area');
    }

    public function create(Request $request){

        $id = $request->input('user_id');
        $name = $request->input('username');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');

        $object = array('id' => $id, 'name' => $name, 'phone' => $phone, 'email' => $email, 'address' => $address);
        $object = json_encode($object);

        $customer = Session('customer')?Session::get('customer'):null;
        if(isNull($customer)){
            $request->session()->put('customer', $object);
        }else{
            Session::forget('customer');
            $request->session()->put('customer', $object);
        }
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "6S7S6MCX"; //Mã website tại VNPAY
        $vnp_HashSecret = "HNAZYJVVCRYLGMKMZGCKZLAAEMIHECGD"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/ThucPhamChucNang/return-vnpay";
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->input('total') * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect($vnp_Url);
    }

    public function return(Request $request){
        $url = session('url_prev','/');

        if($request->vnp_ResponseCode == "00") {

            $customer = Session::get('customer');
            $customer = json_decode($customer);

            $id = $customer->{'id'};
            $name = $customer->{'name'};
            $email = $customer->{'email'};
            $phone = $customer->{'phone'};
            $address = $customer->{'address'};
            if($id == -1){
                $kh = new Customer;
                $kh->name = $name;
                $kh->email = $email;
                $kh->phone = $phone;
                $kh->address = $address;
                $kh->save();

                $order = new Order;
                $order->user_id = $kh->id;
                $order->codition_id = 1;
                $order->date_create = Carbon::now();
                $order->total = $request->vnp_Amount;
                $order->save();

                $cart = Session::get('cart');
                foreach($cart->items as $key => $value){
                    $bill_detail = new OrderDetail;
                    $bill_detail->order_id = $order->id;
                    $bill_detail->product_id = $key;
                    $bill_detail->quantity = $value['qty'];
                    $bill_detail->amount = $value['price'];
                    $bill_detail->save();
                }
                Session::forget('cart');

                $checkout_success = Session::get('checkout_success');
                Session::put('checkout_success');
                return redirect('/bill-detail/'.$order->id)->with('checkout_success','Bạn đã thanh toán thành công');
            }else{
                $order = new Order;
                $order->user_id = $id;
                $order->codition_id = 1;
                $order->date_create = Carbon::now();
                $order->total = $request->vnp_Amount;
                $order->save();

                $cart = Session::get('cart');
                foreach($cart->items as $key => $value){
                    $bill_detail = new OrderDetail;
                    $bill_detail->order_id = $order->id;
                    $bill_detail->product_id = $key;
                    $bill_detail->quantity = $value['qty'];
                    $bill_detail->amount = $value['price'];
                    $bill_detail->save();
                }
                Session::forget('cart');

                $checkout_success = Session::get('checkout_success');
                Session::put('checkout_success');
                return redirect('/bill-detail/'.$order->id)->with('checkout_success','Bạn đã thanh toán thành công');
            }

        }
        session()->forget('url_prev');
        $checkout_fail = Session::get('checkout_fail');
        Session::put('checkout_fail');
        return redirect('/')->with('checkout_fail', 'Lỗi trong quá trình thanh toán dịch vụ');
    }

    public function postCheckoutArea(Request $request){
        $id = $request->input('user_id');
        $name = $request->input('username');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');

        if($id == -1){
            $kh = new Customer;
            $kh->name = $name;
            $kh->email = $email;
            $kh->phone = $phone;
            $kh->address = $address;
            $kh->save();

            $order = new Order;
            $order->user_id = $kh->id;
            $order->codition_id = 1;
            $order->date_create = Carbon::now();
            $order->total = $request->input('total');
            $order->save();

            $cart = Session::get('cart');
            foreach($cart->items as $key => $value){
                $bill_detail = new OrderDetail;
                $bill_detail->order_id = $order->id;
                $bill_detail->product_id = $key;
                $bill_detail->quantity = $value['qty'];
                $bill_detail->amount = $value['price'];
                $bill_detail->save();
            }
            Session::forget('cart');

            $checkout_success = Session::get('checkout_success');
            Session::put('checkout_success');
            return redirect('/bill-detail/'.$order->id)->with('checkout_success','Bạn đã thanh toán thành công');
        }else{
            $order = new Order;
            $order->user_id = $id;
            $order->codition_id = 1;
            $order->date_create = Carbon::now();
            $order->total = $request->input('total');
            $order->save();

            $cart = Session::get('cart');
            foreach($cart->items as $key => $value){
                $bill_detail = new OrderDetail;
                $bill_detail->order_id = $order->id;
                $bill_detail->product_id = $key;
                $bill_detail->quantity = $value['qty'];
                $bill_detail->amount = $value['price'];
                $bill_detail->save();
            }
            Session::forget('cart');

            $checkout_success = Session::get('checkout_success');
            Session::put('checkout_success');
            return redirect('/bill-detail/'.$order->id)->with('checkout_success','Bạn đã thanh toán thành công');
        }

    }

    public function getBillDetail($orderId){
        $order = DB::table('orders')->where('id', $orderId)->get();
        $userId = DB::table('orders')->where('id', $orderId)->select('user_id')->get();

        $customer = DB::table('users')->where('id', $userId[0]->user_id);
        $customer = DB::table('customers')->where('id', $userId[0]->user_id);
        $customer = $customer->get();

        $orderDetail = DB::table('order_details')->where('order_id', $orderId)->get();
        $total = DB::table('orders')->where('id', $orderId)->select('total')->get();

        return view('home.bill')->with([
            'order' => $order,
            'customer' => $customer,
            'orderDetail' => $orderDetail,
            'total' => $total[0]->total
        ]);
    }

    public function search(Request $request){

        $contentSearch = $request->input('q');
        $prominence_product = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('products.name_product', 'like', '%'.$contentSearch.'%')
            ->orWhere('products.description', 'like', '%'.$contentSearch.'%')
            ->orWhere('categories.name', 'like', '%'.$contentSearch.'%')
            ->select('products.*')
            ->get();

        $sum = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('products.name_product', 'like', '%'.$contentSearch.'%')
            ->orWhere('products.description', 'like', '%'.$contentSearch.'%')
            ->orWhere('categories.name', 'like', '%'.$contentSearch.'%')
            ->count();

        return view('home.search_product')->with([
            'prominence_product' => $prominence_product,
            'sum' => $sum
        ]);
    }

    public function getCategory($id){
        $prominence_product = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('categories.id', '=', $id)
            ->select('products.*')
            ->get();

        $sum = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('categories.id', '=', $id)
            ->count();

        return view('home.search_product')->with([
            'prominence_product' => $prominence_product,
            'sum' => $sum
        ]);
    }

    public function new(){
        $news = DB::table('news')->get();
        $tingan = DB::table('news')->latest()->take(3)->get();
        return view('home.news')->with([
            'news' => $news,
            'tingans' => $tingan
        ]);
    }

    public function newDetail($id){
        $new = DB::table('news')->where('id', $id)->get();
        $tingan = DB::table('news')->latest()->take(3)->get();
        $thich = DB::table('news')->skip(4)->take(3)->get();
        return view('home.new_detail')->with([
            'new' => $new,
            'tingans' => $tingan,
            'thichs' => $thich
        ]);
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
