<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Admin;
use DB;
use Session;
use Hash;

class adminController extends Controller{

	public function login(){
		return view('singin&singup.singin.login');
	}
	public function admin(){
		if(session::get('role')==2){
		return view('admin.home.homeContent');
		}else {
		return redirect()->back();
		}
		
	}


	public function adminlogin(Request $request){

		if($data=Admin::where('mobile',$request->mobile)->first()){
          if($data->status==1){
			 if($data->mobile == $request->mobile && Hash::check($request->password,$data->password)){
				 
					if($data->role==1){
					  Session::put('name',$data->name);
					  Session::put('role',$data->role);
					  Session::put('mobile',$data->mobile);
					  Session::put('ID',$data->id);
					  return redirect('/mydashboard');
					}else{
					  Session::put('name',$data->name);
					  Session::put('role',$data->role);
					  Session::put('mobile',$data->mobile);
					  Session::put('ID',$data->id);
					  return redirect('/dashboard');
					}
			 
		  }else{
			  return redirect('/login')->with('pass','wrong');
		  }
			 }else{
				return redirect('/login')->with('deactive','wrong');
			 }
		}else{
			return redirect('/login')->with('mobiles','wrong');
		}
	}
	public function logout(){
                 
		session()->forget('mobile');
	    session()->forget('name');
	    session()->forget('role');
	    session()->forget('ID');  
		return redirect('/login');	
	}

	public function user(){

		if(session::get('role')==2){			
		$user=DB::table('admins')->orderBy('id','DESC')->where('role',1)->get();		
		return view('admin.user.user',compact('user'));
	}else {
		return redirect()->back();
	}
	}
	
	public function user_store(Request $request){
		    $image=$request->file('image');
		    $name=uniqid().$image->getClientOriginalName();
		    $uploadPath='public/image/';
		    $image->move($uploadPath,$name);
		    $imageUrl=$uploadPath.$name;
		    $this->img($request,$imageUrl);		  
		    return redirect()->back()->with('add','add');
		}
	 public function img($request,$imageUrl){
			$user=new Admin();
			$user->name=$request->name;
			$user->mobile=$request->mobile;
			$user->email=$request->email;
			$user->nid=$request->nid;
			$user->role=1;
			$user->status=1;
			$user->address=$request->address;
			$user->password=bcrypt($request->password);
			$user->image=$imageUrl;
			$user->save();      	  

	}

	public function user_edit($id){
		   $data=Admin::find($id);
           return $data;

	}
    public function user_update(Request $request){
			$user=Admin::find($request->id);
			$user->mobile=$request->mobile;
			$user->status=$request->status;
			$user->save();
			return redirect()->back()->with('update','success');
	}
	public function user_delete($id){
		   $data=Admin::find($id);
		   $data->delete();
		   return redirect()->back()->with('delete','success');
	}

}
