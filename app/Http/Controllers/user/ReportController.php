<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use App\User\OrderDetails;
use App\User\Order;
use DateTime;

class ReportController extends Controller
{ 

    //Product Sale Report
    public function product_sale_report(Request $request){
        if(Session::get('role')==1){

        }       
        else {
            return redirect()->back();
        }
        if($request->fromDate==''){
            $salesbydate=OrderDetails::where('user',Session::get('ID'))
                    ->select('order_details.product_id','order_details.productname','order_details.capacity',DB::raw('SUM(qty) as total_qty'), DB::raw('SUM(total) as total_sale'))
                    ->groupBy('product_id','productname','capacity')
                    ->orderBy('total_qty', 'DESC')
                    ->get();
                    $todate=0;
                    $fromdate=0;
        }else{
            $salesbydate=OrderDetails::where('user',Session::get('ID'))
                ->whereDate('created_at', '>=', $request->fromDate)
                ->whereDate('created_at', '<=', $request->toDate)
                ->select('order_details.product_id','order_details.productname','order_details.capacity',DB::raw('SUM(qty) as total_qty'), DB::raw('SUM(total) as total_sale'))
                ->groupBy('product_id','productname','capacity')
                ->orderBy('total_qty', 'DESC')
                ->get();

                $todate=$request->toDate;
                $fromdate=$request->fromDate;
        }

            // dd($salesbydate);
        return view('user.Report.sale',compact('salesbydate','todate','fromdate'));
    }


//order Sale By Report

    public function sale_report(Request $request){
        if(Session::get('role')==1){

        }       
        else {
            return redirect()->back();
        }
        $date = new DateTime("now");
        if($request->fromDate==''){
            $salesbydate =DB::table('orders')
            ->whereDate('orders.created_at', '=', $date)
            ->join('customers','customers.id','=','orders.customerid')
            ->select('orders.*','customers.name','customers.mobile','customers.address')
            ->where('userid',Session::get('ID'))
            ->orderBy('id','DESC')
            ->get();
        $todate=0;
        $fromdate=0;
        }else{
            $salesbydate =DB::table('orders')
                ->whereDate('orders.created_at', '>=', $request->fromDate)
                ->whereDate('orders.created_at', '<=', $request->toDate)
                ->join('customers','customers.id','=','orders.customerid')
                ->select('orders.*','customers.name','customers.mobile','customers.address')
                ->where('userid',Session::get('ID'))
                ->orderBy('id','DESC')
                ->get();

               // dd($salesbydate );
            $todate=$request->toDate;
            $fromdate=$request->fromDate;
        }
           
        return view('user.Report.ordersale',compact('salesbydate','todate','fromdate'));

    }

    //Due Payment Report.................................
    public function due_pay_report(Request $request){
        if(Session::get('role')==1){

        }       
        else {
            return redirect()->back();
        }
        $date = new DateTime("now");
        if($request->fromDate==''){
            $salesbydate =DB::table('orders')
            ->join('customers','customers.id','=','orders.customerid')
            ->select('orders.*','customers.name','customers.mobile','customers.address')
            ->where('userid',Session::get('ID'))
            ->where('duetotal','>',0)
            ->orderBy('id','DESC')
            ->get();
        $todate=0;
        $fromdate=0;
        }else{
            $salesbydate =DB::table('orders')
                ->whereDate('orders.created_at', '>=', $request->fromDate)
                ->whereDate('orders.created_at', '<=', $request->toDate)
                ->join('customers','customers.id','=','orders.customerid')
                ->select('orders.*','customers.name','customers.mobile','customers.address')
                ->where('userid',Session::get('ID'))
                ->where('duetotal','>',0)
                ->orderBy('id','DESC')
                ->get();

               // dd($salesbydate );
            $todate=$request->toDate;
            $fromdate=$request->fromDate;
        }
           
        return view('user.Report.duepay',compact('salesbydate','todate','fromdate'));

    }

    public function expense_report(Request $request){
        if(Session::get('role')==1){

        }       
        else {
            return redirect()->back();
        }
                if($request->expensetype==1){
               $result=DB::table('salaries')
                        ->whereDate('created_at', '>=', $request->fromDate)
                        ->whereDate('created_at', '<=', $request->toDate)
                        ->select( DB::raw('SUM(amount) as total'))
                        ->where('user_id', Session::get('ID'))
                        ->first();

                       // dd($result);
                $todate=$request->toDate;
                $fromdate=$request->fromDate;
                $name="Salary";
                }elseif($request->expensetype==2){
                    $result=DB::table('purchases')
                        ->whereDate('created_at', '>=', $request->fromDate)
                        ->whereDate('created_at', '<=', $request->toDate)
                        ->select( DB::raw('SUM(total) as total'))
                        ->where('user', Session::get('ID'))
                        ->first();
            $todate=$request->toDate;
            $fromdate=$request->fromDate;
            $name="Purchase";
                }elseif($request->expensetype==3){
                    $result=DB::table('daily_expenses')
                    ->whereDate('created_at', '>=', $request->fromDate)
                    ->whereDate('created_at', '<=', $request->toDate)
                    ->select( DB::raw('SUM(amount) as total'))
                    ->where('user_id', Session::get('ID'))
                    ->first();
            $todate=$request->toDate;
            $fromdate=$request->fromDate;
            $name="Daily Expense";
                }else{
                    $result=0;
                    $todate=$request->toDate;
                    $fromdate=$request->fromDate;
                    $name='';
                }
                       
        return view('user.Report.expense',compact('result','todate','fromdate','name'));
    }


}
