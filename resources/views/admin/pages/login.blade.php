@extends('admin.layouts.authorization')
@section('content')

      <div class="login-box" style="text-align: center;">
         <div class="" style="margin-bottom: 65px;">
         <div class="card-header text-center" >
         <img src='{{asset("admin/assets/images/logo/logo.png")}}'>
            <span class="h3"><b>Admin</b> Login</h1>
         </div>
         <div class="card-body">
            <form action="login" method="post">
               @csrf 
               @include('admin.layouts.validations.Errormessage')
               <div class="input-group mb-3">
                  <input type="email" class="form-control" name="email" placeholder="Email"  value="{{old('email')}}" required>  
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                     </div>
                  </div>
                  @if ($errors->has('email'))
                     <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                  @endif
               </div>
               <div class="input-group mb-3">
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>
                  @if ($errors->has('password'))
                     <span class="text-danger text-left">{{$errors->first('password') }}</span>
                  @endif
               </div>
               <div class="row">
                  <div class="col-8">
                     <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                        Remember Me
                        </label>
                     </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                     <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                  </div>
                  <!-- /.col -->
               </div>
            </form>
         </div>
         <!-- /.card-body -->
         </div>

         <strong>Copyright &copy; 2021 <a href="https://smartmediajo.com/">Smart Media</a>.</strong><br />
         All rights reserved.
      </div>

@endsection