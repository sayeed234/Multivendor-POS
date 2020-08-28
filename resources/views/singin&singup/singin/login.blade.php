@extends('singin&singup.master_singin&up')
@section('mainContent')

<body  style="background-image: url({{asset('/img')}}/doyel.jpg); background-size: 100% auto;">

<h3 class="text-center text-success">{{ Session::get('successmessage') }}</h3>

    <form class="form-login" method="post" action="{{url('/login')}}">
      {{ csrf_field() }}
        <h2 class="form-login-heading">Welcome To Software</h2>

                 @if (session('mobiles'))
                        <div class="alert alert-dismissible alert-danger">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong> Please Enter Valid Mobile Number</strong>
                        </div>
                    @endif
                       @if (session('pass'))
                        <div class="alert alert-dismissible alert-danger">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong> Wrong Password</strong>
                        </div>
                    @endif
                       @if (session('deactive'))
                        <div class="alert alert-dismissible alert-danger">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong> Your ID Deactived. </strong>
                        </div>
                    @endif


           @if (session('mama'))
                        <div class="alert alert-dismissible alert-danger">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong> Please Log in to Access!!!!</strong>
                        </div>
              @endif
        <div class="login-wrap">
          <input type="text" class="form-control" required placeholder="Mobile" name="mobile" autofocus>
        
          <br>
          
               <input type="password" class="form-control" required placeholder="Password" name="password" id="showPass" >
               <span toggle="#password-field" class="fa fa-lg fa-eye field-icon toggle-password"  onclick="myFunction()"></span>
            
         <br>
          <button class="btn btn-theme btn-block" name="btn" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
        </div>
        <div class="copywrite text-center" style="font-size: 12px;margin-top: 15px;">
          <div class="text-center"> <b style="font-size: 12px;"> Copyright &copy; <a href="">LS Soft</a>&nbsp; <?php echo date("Y") ?>.</b><br><br>

      
     
      </form>

    </div>
  </div>
</form>
</body>


    
@endsection