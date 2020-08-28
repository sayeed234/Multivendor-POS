<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Cart;
use DateTime;
use DB;
use App\User\Band;
use App\Admin\Admin;
use App\User\SoftProduct;
use App\User\Order;
use App\User\OrderDetails;
use App\User\Payment;
use App\User\Customer;
use App\User\Stock;
use App\User\Purchase;
use App\User\DailyExpense;
use App\User\Salary;

class UserController extends Controller
{
    public function user(){      
        if(Session::get('role')==1){

            $date = new DateTime("now");
 
             $totalsale=Order::where('userid',Session::get('ID'))
                       ->select( DB::raw('SUM(subtotal) as total_sale'))
                       ->first();
             $totalpayment=Order::where('userid',Session::get('ID'))
                       ->select( DB::raw('SUM(paytotal) as total_pay'))
                       ->first();
            $totaldue=Order::where('userid',Session::get('ID'))
                       ->select( DB::raw('SUM(duetotal) as total_due'))
                       ->first();
            $totalemi=Order::where('userid',Session::get('ID'))
                       ->select( DB::raw('SUM(totalemi) as total_emi'))
                       ->first();
            $qty=Order::where('userid',Session::get('ID'))
                       ->select( DB::raw('SUM(qty) as qty'))
                       ->first();
            $totalpurchase=Purchase::where('user',Session::get('ID'))
                       ->select( DB::raw('SUM(total) as total_purchase'))
                       ->first();
            $totalexpense=DailyExpense::where('user_id',Session::get('ID'))
                       ->select( DB::raw('SUM(amount) as total_expense'))
                       ->first();
            $totalsalary=Salary::where('user_id',Session::get('ID'))
                       ->select( DB::raw('SUM(amount) as total_salary'))
                       ->first();
               //dd($totalpurchase);

            $totalsalet=Order::where('userid',Session::get('ID'))
                        ->wheredate('created_at',$date)
                        ->select( DB::raw('SUM(subtotal) as total_sale'))
                        ->first();
            $totalpaymentt=Order::where('userid',Session::get('ID'))
                          ->wheredate('created_at',$date)
                        ->select( DB::raw('SUM(paytotal) as total_pay'))
                        ->first();
             $totalduet=Order::where('userid',Session::get('ID'))
                        ->wheredate('created_at',$date)
                        ->select( DB::raw('SUM(duetotal) as total_due'))
                        ->first();
             $totalemit=Order::where('userid',Session::get('ID'))
                       ->wheredate('created_at',$date)
                        ->select( DB::raw('SUM(totalemi) as total_emi'))
                        ->first();
             $qtyt=Order::where('userid',Session::get('ID'))
                        ->wheredate('created_at',$date)
                        ->select( DB::raw('SUM(qty) as qty'))
                        ->first();
             $totalpurchaset=Purchase::where('user',Session::get('ID'))
                        ->wheredate('created_at',$date)
                        ->select( DB::raw('SUM(total) as total_purchase'))
                        ->first();
             $totalexpenset=DailyExpense::where('user_id',Session::get('ID'))
                        ->wheredate('created_at',$date)
                        ->select( DB::raw('SUM(amount) as total_expense'))
                        ->first();
             $totalsalaryt=Salary::where('user_id',Session::get('ID'))
                        ->wheredate('created_at',$date)
                        ->select( DB::raw('SUM(amount) as total_salary'))
                        ->first();

                       //dd($totalsalet);

            $stock=DB::table('stocks')
                       ->join('soft_products','soft_products.id','=','stocks.product_id')
                       ->select('stocks.*','soft_products.productname')  
                       ->where('user_id',Session::get('ID'))
                       ->orderBy('stock','ASC')
                       ->limit(8)
                       ->get();

                       //dd($result);

            return view('user.home.homeContent',compact('totalsale','totalpayment','totaldue','totalemi','totalpurchase','totalexpense','totalsalary','qty','totalsalet','totalpaymentt','totalduet','totalemit','totalpurchaset','totalexpenset','totalsalaryt','qtyt','stock'));
        }       
        else {
            return redirect()->back();
        }
    }
    //profile......................................
    public function profile(){
        if(Session::get('role')==1){

            $result=Admin::where('id',session::get('ID'))->first();
            return view('user.home.profile',compact('result'));
        }       
        else {
            return redirect()->back();
        }
    }
    public function profile_edit($id){
        $data=Admin::find($id);
        return $data;

    }

    public function profile_update(Request $request){

        $companyById = Admin::find( $request->id);
        $image=$request->file('image');
      
        if ($image) {
            File::delete(public_path() . '/image/', $companyById->image);
            $name=uniqid().$image->getClientOriginalName();
            $uploadPath='public/image/';
            $image->move($uploadPath,$name);
            $imageUrl=$uploadPath.$name;
          
        } else {
            $imageUrl = $companyById->image;
        }
         $this->imge($request,$imageUrl);
         return redirect()->back()->with('update','success');
          
      }
    
          public function imge($request,$imageUrl){
                 $profile=Admin::find($request->id);
                 $profile->name=$request->name;
                 $profile->free1=$request->free1;
                 $profile->free2=$request->free2;
                 $profile->free3=$request->free3;
                 $profile->email=$request->email;
                 $profile->ownname=$request->ownname;
                 $profile->discription=$request->discription;
                 $profile->address=$request->address;
                 $profile->image=$imageUrl;
                 $profile->save();        
              
       }

       public function password(Request $request){

        if($data=Admin::where('mobile',$request->mobile)->first()){
               if($data->mobile == $request->mobile && Hash::check($request->password,$data->password)){
                   
             $change=Admin::where('id',session::get('ID'))->where('mobile',$request->mobile)->first(); 
             $change->password=bcrypt($request->new);
             $change->save();
            return redirect()->back()->with('change','wrong');
            }else{
                return redirect()->back()->with('passs','wrong');
            }
 
          }else{
            return redirect()->back()->with('mobil','wrong');
          }
       }

    }
