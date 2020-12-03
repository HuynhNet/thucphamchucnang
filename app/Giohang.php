<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Giohang extends Model
{
    public $items = null;
    public $totalQty = 0; // tong so luong san pham
    public $totalPrice = 0; // tong gia san pham

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id){
        $priceID = DB::table('prices')->where('id', $item->price)->get();
        foreach ($priceID as $priceID){
            $price = $priceID->price;
        }

        $giohang = ['qty'=>0, 'price' => $price, 'item' => $item];

        if($this->items){
            if(array_key_exists($id, $this->items)){
                $giohang = $this->items[$id];
            }
        }

        $giohang['qty']++;
        $giohang['price'] = $price * $giohang['qty'];

        $this->items[$id] = $giohang;
        $this->totalQty++;
        $this->totalPrice += $price;

    }

    public function addWithQuantity($item, $id, $quantity){
        $priceID = DB::table('prices')->where('id', $item->price)->get();
        foreach ($priceID as $priceID){
            $price = $priceID->price;
        }

        $giohang = ['qty'=>0, 'price' => $price, 'item' => $item];

        if($this->items){
            if(array_key_exists($id, $this->items)){
                $giohang = $this->items[$id];
            }
        }

        $giohang['qty'] = $quantity;
        $giohang['price'] = $price * $giohang['qty'];

        $this->items[$id] = $giohang;
        $this->totalQty += $quantity;
        $this->totalPrice += $price;
    }

    // update cart
    public function update_cart($id,$newQty){
        $product = DB::table('products')->where('id', $id)->get();
        foreach ($product as $product){
            $priceID = DB::table('prices')->where('id', $product->price)->get();
        }
        foreach ($priceID as $priceID){
            $price = $priceID->price;
        }

        $present_qty = $this->items[$id]['qty'];

        if( $present_qty > $newQty){
            $this->items[$id]['qty'] = $newQty;
            $cut = $present_qty - $newQty;
            $this->totalQty -= $cut;
            $this->totalPrice -= $price * $cut;
            if($this->items[$id]['qty']<=0){
                unset($this->items[$id]);
            }
        }

        if($present_qty < $newQty){
            $this->items[$id]['qty'] = $newQty;
            $add = $newQty - $present_qty;
            $this->totalQty += $add;
            $this->totalPrice += $price * $add;
            if($this->items[$id]['qty']<=0){
                unset($this->items[$id]);
            }
        }

    }

    //xóa 1
    public function reduceByOne($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if($this->items[$id]['qty']<=0){
            unset($this->items[$id]);
        }
    }
    //xóa nhiều
    public function removeItem($id){
        $product = DB::table('products')->where('id', $id)->get();
        foreach ($product as $product){
            $priceID = DB::table('prices')->where('id', $product->price)->get();
        }
        foreach ($priceID as $priceID){
            $price = $priceID->price;
        }

        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $price * $this->items[$id]['qty'];
        unset($this->items[$id]);
    }
}
