<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Admin\Admin;
use App\User\Employee;
use App\User\Salary;
use App\User\Customer;
use DB;

class EmployeeController extends Controller
{
    public function employee(){
        if(Session::get('role')==1){

            $result=DB::table('employees')->where('userid',Session::get('ID'))->orderBy('id','DESC')->get();
            return view('user.employee.employee',compact('result'));
        }       
        else {
            return redirect()->back();
        }
    }

    public function  employee_store(Request $request){
      //  dd($request->all());
        $employee=new Employee();
        $employee->userid=Session::get('ID');
        $employee->name=$request->name;
        $employee->mobile=$request->mobile;
        $employee->email=$request->email;
        $employee->nid=$request->nid;
        $employee->address=$request->address;
        $employee->status=1;
        $employee->save();
        return redirect()->back()->with('add','success');
    }

    public function employee_edit($id){
        $em= Employee::find($id);
        return $em;
    }
    public function  employee_update(Request $request){
        //  dd($request->all());
          $employee=Employee::find($request->id);
          $employee->name=$request->name;
          $employee->mobile=$request->mobile;
          $employee->email=$request->email;
          $employee->nid=$request->nid;
          $employee->address=$request->address;
          $employee->status=$request->status;
          $employee->save();
          return redirect()->back()->with('update','success');
      }

      public function employee_salary(){
        if(Session::get('role')==1){

            $result=DB::table('employees')->where('userid',Session::get('ID'))->where('status',1)->get();
            $salary=DB::table('salaries')
                   ->join("employees",'employees.id','=','salaries.employee_id')
                   ->select('salaries.*','employees.name','employees.mobile')
                   ->where('user_id',Session::get('ID'))
                   ->orderBy('id',"DESC")
                   ->get();
           //dd($salary);

            return view('user.employee.salary',compact('result','salary'));
        }       
        else {
            return redirect()->back();
        }
      }
      public function  employee_salary_store(Request $request){

                      $salary=new Salary();
                      $salary->user_id=Session::get('ID');
                      $salary->employee_id=$request->name;
                      $salary->amount=$request->amount;
                      $salary->save();
                    return redirect()->back()->with('add','success');
             }
        public function employee_salary_edit($id){
            $em= Salary::find($id);
             return $em;
        }   
        public function  employee_salary_update(Request $request){

            $salary=Salary::find($request->id);
            $salary->employee_id=$request->name;
            $salary->amount=$request->amount;
            $salary->save();
          return redirect()->back()->with('update','success');
   }
   public function employee_salary_delete($id){
    $em= Salary::find($id);
    $em->delete();
    return redirect()->back()->with('delete','success');
   } 

public function emicustomer(){
    if(Session::get('role')==1){
       $customer=Customer::where('user_id',Session::get('ID'))->orderBy('id','DESC')->get();


      return view('user.employee.customer',compact('customer'));
        }       
        else {
            return redirect()->back();
        }
   }

}
