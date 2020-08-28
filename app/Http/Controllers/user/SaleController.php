<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Cart;
use DateTime;
use DB;
use App\User\Band;
use App\User\SoftProduct;
use App\User\Order;
use App\User\OrderDetails;
use App\User\Payment;
use App\User\Customer;
use App\User\Stock;

class SaleController extends Controller
{

  //******************************Product Cart Show********************************

  public function view($id){

      if(Session::get('role')==1){

      $band=Band::where('user_id',Session::get('ID'))->get();

      if($id=='all'){
      $product=DB::table('soft_products')
              ->join('stocks','stocks.product_id','=','soft_products.id')
              ->select('soft_products.*','stocks.stock')
              ->where('userid',Session::get('ID'))
              ->where('status',1)
              ->get();
      }else{
          $product=DB::table('soft_products')
              ->join('stocks','stocks.product_id','=','soft_products.id')
              ->select('soft_products.*','stocks.stock')
              ->where('userid',Session::get('ID'))
              ->where('status',1)
              ->where('bandid',$id)
              ->get();
      }
  
          return view('user.sale.productview',compact('band','product'));
      }       
      else {
          return redirect()->back();
      }
      
  }

  public function addtocart(Request $request){
      $products=SoftProduct::find($request->id);
      Cart::add([
          'id'=>$request->id,
          'qty'=>$request->qty,
          'name'=>$products->productname,
          'price'=>$products->saleprice,
          'weight'=>1,
          'options' => [
                  'capacity' => $products->capacity,
                  'color' => $request->color,
                  'user' => Session::get('ID')
          ]
  
        ]);
      return redirect()->back();       
  }
  public function cartshow(){
      if(Cart::count()==0){
          return redirect('/product_view/all');
      }else{
          $cartProduct=Cart::content(); 

        // dd($cartProduct);
          return view('user.sale.cartshow',compact('cartProduct'));
      }
    }

public function cartshow_delete($id){
        Cart::remove($id);
      return redirect()->back();
}
public function cartshow_update(Request $request){
  Cart::update($request->rowId, [
      'qty' => $request->qty,
      'price'=> $request->price
  ]);
  return redirect()->back();
}
  
  //******************************Product Cart Show********************************

    public function sale(Request $request){

        if($request->sale==1){
          //regular sale...............................
          $date = new DateTime("now");

            $customer=new Customer();
            $customer->user_id=Session::get('ID');
            $customer->name=$request->name;
            $customer->mobile=$request->mobile;
            $customer->address=$request->address;
            $customer->date=$date->format("d-M-Y");

            if($customer->save()){
            $order=new Order();
            $order->userid=Session::get('ID');
            $order->customerid=$customer->id;
            $order->subtotal=$request->subtotal;
            $order->paytotal=$request->payment;
            $order->duetotal=($request->subtotal-$request->payment);
            $order->qty=Cart::count();
            $order->status="Regular";
            $order->paytime=0;
            $order->date=$date->format("d-M-Y");
            $order->save();
            }
            Session::put('customer_id',$customer->id);
            $cartProducts= Cart::content();
          foreach($cartProducts as $cartProduct){
            $orderdetails=new OrderDetails();
            $orderdetails->user=Session::get('ID');
            $orderdetails->order_id=$order->id;
            $orderdetails->product_id=$cartProduct->id;
            $orderdetails->productname=$cartProduct->name;
            $orderdetails->capacity=$cartProduct->options->capacity;
            $orderdetails->color=$cartProduct->options->color;
            $orderdetails->qty=$cartProduct->qty;
            $orderdetails->price=$cartProduct->price;
            $orderdetails->total=($cartProduct->qty*$cartProduct->price);
            $orderdetails->date=$date->format("d-M-Y");
            if($orderdetails->save()){
            $stock=Stock::where('user_id',Session::get('ID'))->where('product_id',$cartProduct->id)->first();
            $stock->stock=$stock->stock-$cartProduct->qty;
            $stock->save();
                }
                                      
          }
          if($request->payment==0){
          }else{
              $payment=new Payment();
              $payment->users_id=Session::get('ID');
              $payment->orderid=$order->id;
              $payment->customerid=$customer->id;
              $payment->payment=$request->payment;
              $payment->date=$date->format("d-M-Y");
              $payment->save();
          }
          Session::put('order_id',$order->id);
          Cart::destroy();
          return redirect('/sale/invoice');
        }else{
          $date = new DateTime("now");
          $customer=new Customer();
          $customer->user_id=Session::get('ID');
          $customer->name=$request->name;
          $customer->mobile=$request->mobile;
          $customer->nid=$request->nid;
          $customer->address=$request->address;
          $customer->nominame=$request->nominame;
          $customer->nomimobile=$request->nomimobile;
          $customer->nominid=$request->nominid;
          $customer->relation=$request->relation;
          $customer->date=$date->format("d-M-Y");

        
        if($customer->save()){
          $order=new Order();
          $order->userid=Session::get('ID');
          $order->customerid=$customer->id;
          $order->paytotal=$request->payment;
          $order->duetotal=((((($request->subtotal-$request->payment)*($request->emi))/100)*$request->month)+($request->subtotal-$request->payment));
          $order->qty=Cart::count();
          $order->month=$request->month;
          $order->monthpay=((((($request->subtotal-$request->payment)*($request->emi))/100)*$request->month)+($request->subtotal-$request->payment))/$request->month;
          $order->emi=$request->emi;
          $order->subtotal=$request->subtotal+(((($request->subtotal-$request->payment)*($request->emi))/100)*$request->month);
          $order->totalemi=(((($request->subtotal-$request->payment)*($request->emi))/100)*$request->month);
          $order->paytime=0;
          $order->status="EMI";
          $order->date=$date->format("d-M-Y");
          $order->save();
          }
        Session::put('customer_id',$customer->id);
          $cartProducts= Cart::content();
        foreach($cartProducts as $cartProduct){
          $orderdetails=new OrderDetails();
          $orderdetails->user=Session::get('ID');
          $orderdetails->order_id=$order->id;
          $orderdetails->product_id=$cartProduct->id;
          $orderdetails->productname=$cartProduct->name;
          $orderdetails->capacity=$cartProduct->options->capacity;
          $orderdetails->color=$cartProduct->options->color;
          $orderdetails->qty=$cartProduct->qty;
          $orderdetails->price=$cartProduct->price;
          $orderdetails->total=($cartProduct->qty*$cartProduct->price);
          $orderdetails->date=$date->format("d-M-Y");
          if($orderdetails->save()){
          $stock=Stock::where('user_id',Session::get('ID'))->where('product_id',$cartProduct->id)->first();
          $stock->stock=$stock->stock-$cartProduct->qty;
          $stock->save();
          }
      }
        if($request->payment==0){
        }else{
            $payment=new Payment();
            $payment->users_id=Session::get('ID');
            $payment->orderid=$order->id;
            $payment->customerid=$customer->id;
            $payment->payment=$request->payment;
            $payment->date=$date->format("d-M-Y");
            $payment->save();
        }
        Session::put('order_id',$order->id);
        Cart::destroy();
        return redirect('/sale/invoice');
        }

    }

    public function invoice(){
                  
      $order=DB::table('orders')
          ->where('userid',Session::get('ID'))
          ->where('id',Session::get('order_id'))
          ->first();
          
      $customer=DB::table('customers')
          ->where('user_id',Session::get('ID'))
          ->where('id',Session::get('customer_id'))
          ->first(); 
        
      $orderdetails=DB::table('order_details')
          ->where('user',Session::get('ID'))
          ->where('order_id',Session::get('order_id'))
          ->get(); 
          // dd($orderdetails); 
          return view('user.sale.invoice',compact('order','customer','orderdetails'));
    }



}
