<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use DateTime;
use App\User\Band;
use App\User\Purchase;
use App\User\DailyExpense;

class ExpenseController extends Controller
{

    //purchase.............................................
    public function purchase(){

        if(Session::get('role')==1){
  
            $band=Band::where('user_id',Session::get('ID'))->get();
            $bands=Band::where('user_id',Session::get('ID'))->get();
            $purchase=DB::table('purchases')
                        ->join('bands','bands.id','=','purchases.band')
                        ->select('purchases.*','bands.bandname')
                        ->where('user_id',Session::get('ID'))
                        ->orderBy('id','DESC')
                        ->get();
            //dd($band);
            return view('user.expense.purchase',compact('band','bands','purchase'));
    
        }else {
            return redirect()->back();      
         }
       
    }
    public function purchase_sotre(Request $request){
        $date = new DateTime("now");        
        $purchase=new Purchase();
        $purchase->user=Session::get('ID');
        $purchase->band=$request->band;
        $purchase->dealername=$request->dealarname;
        $purchase->qty=$request->qty;
        $purchase->total=$request->total;
        $purchase->invoice=$request->invoice;
        $purchase->date=$date->format("d-M-Y");
        $purchase->save();
        return redirect()->back()->with('add','success');   
    }
    public function purchase_edit($id){
           $data=Purchase::find($id);
           return $data;
    }
    public function purchase_update(Request $request){
        $date = new DateTime("now");        
        $purchase=Purchase::find($request->id);
        $purchase->user=Session::get('ID');
        $purchase->band=$request->band;
        $purchase->dealername=$request->dealarname;
        $purchase->qty=$request->qty;
        $purchase->total=$request->total;
        $purchase->invoice=$request->invoice;
        $purchase->date=$date->format("d-M-Y");
        $purchase->save();
        return redirect()->back()->with('update','success');   
    }
    public function purchase_delete($id){
        $data=Purchase::find($id);
        $data->delete();
        return redirect()->back()->with('delete','success');   
    }

         public function daily_expense(){
            if(Session::get('role')==1){
                $daily=DailyExpense::where('user_id',Session::get('ID'))->orderBy('id','DESC')->get();
            
                return view('user.expense.dailyexpense',compact('daily'));
        
            }else {
                return redirect()->back();      
             }
        }

        public function daily_store(Request $request){
            
           $date = new DateTime("now");     
           $daily=new DailyExpense();
           $daily->user_id=Session::get('ID');
           $daily->expense_type=$request->expense_type;
           $daily->purpose=$request->purpose;
           $daily->amount=$request->amount;
           $daily->details=$request->details;
           $daily->date=$date->format("d-M-Y");
           $daily->save();
           return redirect()->back()->with('add','success');   

        }

        public function daily_edit($id){
            $data=DailyExpense::find($id);
            return $data;
        }
        public function daily_delete($id){
            $data=DailyExpense::find($id);
           $data->delete();
           return redirect()->back()->with('delete','success');   
        }
        public function daily_update(Request $request){
            $date = new DateTime("now");     
            $daily=DailyExpense::find($request->id);
            $daily->user_id=Session::get('ID');
            $daily->expense_type=$request->expense_type;
            $daily->purpose=$request->purpose;
            $daily->amount=$request->amount;
            $daily->details=$request->details;
            $daily->date=$date->format("d-M-Y");
            $daily->save();
            return redirect()->back()->with('update','success');   
 
         }

}
