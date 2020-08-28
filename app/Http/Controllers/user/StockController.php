<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use App\User\Stockd;
use App\User\Stock;

class StockController extends Controller
{
    public function newstock(){

        if(Session::get('role')==1){
      $result=DB::table('stockds')
            ->join('soft_products','soft_products.id','=','stockds.product_id')
            ->select('stockds.*','soft_products.productname','soft_products.capacity','soft_products.image','soft_products.color')
            ->where('user_id',Session::get('ID'))
            ->orderBy('id','DESC')
            ->get();
       $stock=DB::table('soft_products')
             ->where('userid',Session::get('ID')) 
             ->orderBy('id','DESC')
             ->get();
     $stockedit=DB::table('soft_products')
             ->where('userid',Session::get('ID')) 
             ->orderBy('id','DESC')
             ->get();
             //dd($stock);
            return view('user.stock.newstock',compact('result','stock','stockedit'));
        }       
        else {
            return redirect()->back();
        }
      
    }
     
    public function newstock_store(Request $request){

             $stocks=new Stockd();
             $stocks->user_id=Session::get('ID');
             $stocks->product_id=$request->product_id;
             $stocks->qty=$request->qty;
             $stocks->buyprice=$request->buyprice;
             $stocks->saleprice=$request->saleprice;
            
             if($stocks->save()){
                $stock=Stock::where('product_id',$request->product_id)->first();
                $stock->stock=$stock->stock+$request->qty;
                $stock->save();
             }
            return redirect()->back()->with('add','sss');
            
    }

    public function newstock_edit($id){
        $data=Stockd::find($id);
        return $data;
    }

    public function newstock_update(Request $request){

        $pree=Stockd::find($request->id);
        $stocks=Stockd::find($request->id);
        $stocks->product_id=$request->product_id;
        $stocks->qty=$request->qty;
        $stocks->buyprice=$request->buyprice;
        $stocks->saleprice=$request->saleprice;
             
        if($stocks->save()){
           $stock=Stock::where('product_id',$request->product_id)->first();
           $stock->stock=($stock->stock+$request->qty)-($pree->qty);
           $stock->save();
        }
       return redirect()->back()->with('update','sss');
       
}





    //stock
    public function stock(){

        if(Session::get('role')==1){
      $result=DB::table('stocks')
            ->join('soft_products','soft_products.id','=','stocks.product_id')
            ->select('stocks.*','soft_products.productname','soft_products.capacity','soft_products.image','soft_products.color') 
            ->orderBy('id','DESC')  
            ->where('user_id',Session::get('ID'))
            ->get();

            //dd($result);
            return view('user.stock.stocklist',compact('result'));
        }       
        else {
            return redirect()->back();
        }
      
    }
}
