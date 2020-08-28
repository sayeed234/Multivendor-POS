<?php

namespace App\Http\Controllers\user;

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


class PaymentController extends Controller
{
    public function sale_pending(){

        if(Session::get('role')==1){

        $order=DB::table('orders')
               ->join('customers','customers.id','=','orders.customerid')
               ->select('orders.*','customers.name','customers.mobile','customers.address')
               ->where('userid',Session::get('ID'))
               ->where('duetotal','>', 0)
               ->orderBy('id','DESC')
               ->get();

        //dd($order);
            return view('user.sale.pendingpay',compact('order'));

              }else {
                  return redirect()->back();      
           }
    }
    public function payment($id){
        $data=Order::find($id);
        return $data;
    }

    public function success_sale(){

        if(Session::get('role')==1){
        $order=DB::table('orders')
               ->join('customers','customers.id','=','orders.customerid')
               ->select('orders.*','customers.name','customers.mobile','customers.address')
               ->where('userid',Session::get('ID'))
               ->where('duetotal','<=', 0)
               ->orderBy('id','DESC')
               ->get();

            return view('user.sale.success',compact('order'));

              }else {
                  return redirect()->back();      
           }
    }

    public function payment_history(){
        if(Session::get('role')==1){
         $result=DB::table('payments')
                 ->join('customers','customers.id','=','payments.customerid')
                 ->select('payments.*','customers.name','customers.mobile','customers.address')
                 ->where('users_id',Session::get('ID'))
                 ->orderBy('id','DESC')
                 ->get();
                 //dd($result);
              return view('user.sale.payhistory',compact('result'));
    }else {
        return redirect()->back();      
      }
    }

    public function payment_store(Request $request){

           
            if($request->duetotal-$request->payment<0){
            return redirect()->back()->with('back','dddd');
            }else{
                $date = new DateTime("now");
                $order=Order::find($request->id);
                $order->paytotal=$order->paytotal+$request->payment;
                $order->duetotal=$order->duetotal-$request->payment;
                  
                if($order->save()){
                    $payment= new Payment();
                    $payment->users_id=Session::get('ID');
                    $payment->orderid=$request->id;
                    $payment->customerid=$request->customer;
                    $payment->payment=$request->payment;
                    $payment->date=$date->format("d-M-Y");
                    $payment->save();
                }
                return redirect()->back()->with('update','dddd'); 
            }       
    }

    public function payment_view($id){

            
        if(Session::get('role')==1){

        $order=DB::table('orders')
                 ->where('userid',Session::get('ID'))
                 ->where('id',$id)
                 ->first();
            if($order==''){
                return redirect()->back();
            }else{        
            
        $customer=DB::table('customers')
             ->where('user_id',Session::get('ID'))
             ->where('id',$order->customerid)
             ->first(); 
           
        $orderdetails=DB::table('order_details')
             ->where('user',Session::get('ID'))
             ->where('order_id',$id)
             ->get(); 
       $payment=DB::table('payments')
             ->where('users_id',Session::get('ID'))
             ->where('orderid',$id)
             ->get();
            }
             return view('user.sale.paymentview',compact('order','customer','orderdetails','payment'));
        }else{

        }
        
         

    }
}
