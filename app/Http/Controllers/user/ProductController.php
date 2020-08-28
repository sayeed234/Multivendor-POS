<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use File;
use App\User\Band;
use App\User\SoftProduct;
use App\User\Stock;
use App\User\Stockd;

class ProductController extends Controller
{
    public function product_band(){

        if(Session::get('role')==1){
            $result=DB::table('bands')->where('user_id',Session::get('ID'))->orderBy('id','DESC')->get();
            return view('user.product.band',compact('result'));
        }       
        else {
            return redirect()->back();
        }
      
    }
    public function product_band_store(Request $request){
              
        $band=new Band();
        $band->user_id=Session::get('ID');
        $band->bandname=$request->bandname;
        $band->save();
        return redirect()->back()->with('add','ddd');
    }

    public function product_band_edit($id){
        $data=Band::find($id);
        return $data;
    }
    public function product_band_update(Request $request){
              
        $band=Band::find($request->id);
        $band->bandname=$request->bandname;
        $band->save();
        return redirect()->back()->with('update','ddd');
    }
    public function product_band_delete($id){
        $data=Band::find($id);
        $data->delete();
        return redirect()->back()->with('delete','ddd');
    }



    public function product(){

        if(Session::get('role')==1){
      $result=DB::table('bands')->where('user_id',Session::get('ID'))->orderBy('id','DESC')->get();
      $result1=DB::table('bands')->where('user_id',Session::get('ID'))->orderBy('id','DESC')->get();
      $product=DB::table('soft_products')->where('userid',Session::get('ID'))->orderBy('id','DESC')->get();
            return view('user.product.product',compact('result','result1','product'));
        }       
        else {
            return redirect()->back();
        }
      
    }
    public function product_store(Request $request){
        $image=$request->file('image');
        $name=uniqid().$image->getClientOriginalName();
        $uploadPath='public/image/';
        $image->move($uploadPath,$name);
        $imageUrl=$uploadPath.$name;
        $this->img($request,$imageUrl);		  
        return redirect()->back()->with('add','add');
    }
 public function img($request,$imageUrl){
        $product=new SoftProduct();
        $product->userid=Session::get('ID');
        $product->bandid=$request->productband;
        $product->productname=$request->productname;
        $product->color=$request->color;
        $product->buyprice=$request->buyprice;
        $product->status=1;
        $product->saleprice=$request->saleprice;
        $product->capacity=$request->capacity;
        $product->size=$request->size;
        $product->image=$imageUrl;
     
        if( $product->save()) {
            $stockd=new Stockd();
            $stockd->user_id=Session::get('ID');
            $stockd->product_id=$product->id;
            $stockd->buyprice=$request->buyprice;
            $stockd->saleprice=$request->saleprice;
            $stockd->qty=$request->qty;
        }
           if($stockd->save()){
        $stock=new Stock();
        $stock->user_id=Session::get('ID');
        $stock->product_id=$product->id;
        $stock->stock=$request->qty;
        $stock->save();
            }
      }

      public function product_edit($id){
          $data=SoftProduct::find($id);
          return $data;
      }

      public function product_delete($id){
        $data=SoftProduct::find($id);
        $data->delete();
        return redirect()->back()->with('delete','success');
    }

      public function product_update(Request $request){

       // dd($request->all());
        $product= SoftProduct::find($request->id);

        //dd($product);
        $imagea=$request->file('image');
      
        if ($imagea) {
            File::delete(public_path() . '/image/', $product->image);
            $name=uniqid().$imagea->getClientOriginalName();
            $uploadPath='public/image/';
            $imagea->move($uploadPath,$name);
            $imageUrl=$uploadPath.$name;
          
        } else {
            $imageUrl = $product->image;
        }
         $this->imge($request,$imageUrl);
         return redirect()->back()->with('update','success');
      
       
      }
    
          public function imge($request,$imageUrl){
                $product=SoftProduct::find($request->id);
                $product->bandid=$request->productband;
                $product->productname=$request->productname;
                $product->color=$request->color;
                $product->buyprice=$request->buyprice;
                $product->status=$request->status;
                $product->saleprice=$request->saleprice;
                $product->capacity=$request->capacity;
                $product->size=$request->size;
                $product->image=$imageUrl;
                $product->save();        
    
          }
		  
      
}
