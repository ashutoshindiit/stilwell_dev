@extends('layouts.app')
@section('content')
<style>
   .header-area,
   footer{
      display: none;
   }
</style>
<section class="login">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-6 col-12 login-bg-wrap">
            <div class="loginbg" style="background-image: url('assets/images/loginbg.jpg');">
               <div class="login-header" style="margin-top: -50px;">
                  <div class="login-transformY-50 login-transition-delay-1">
                     <a href="login.php" class="login-logo">
                        <!-- <img style="height: 100px;" src="assets/images/logo.png" alt="Logo"> -->
                        <h2 class="logoH2">Abc</h2>
                     </a>
                  </div>
                  <div class="login-transformY-50 login-transition-delay-2">
                     <h1>Welcome To Abc</h1>
                  </div>
                  <div class="login-transformY-50 login-transition-delay-3">
                     <p>Abc Design &amp; Remodeling, based in Indianapolis, Indiana, is an award-winning Design/Build firm. We offer a complete range of in-house services to help you achieve your goals. We work with you to create a successful project from the initial Design through completion of the project</p>
                  </div>
               </div>
               <ul class="login-socials">
                  <p style="color:#fff">© Copyright 2021 Abc . All Rights Reserved</p>
               </ul>
            </div>
         </div>
         <div class="col-md-6 col-12 login-bg-color">
            <div class="login-content">
               <div class="loginBox">
                  <div class="heading">
                     <h2>Forgot Your Password</h2>
                     <p>Please enter your email address and we will send you a password link to reset password.</p>
                  </div>
                  @if (session('message'))
                     <div class="alert alert-success" role="alert">
                           {{ session('message') }}
                     </div>
                  @endif   
                  @if (session('error'))
                     <div class="alert alert-alert" role="alert">
                           {{ session('error') }}
                     </div>
                  @endif                  
                  <form method="POST" action="{{ Route('forgot.sendEmail') }}">
                     @csrf 
                     <div class="form-group">
                        <label for="email" class="input-label">Email Address</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="demo@gmail.com" required="required" value="{{ old('email') }}">                      
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16">
                           <g transform="translate(0)">
                              <path d="M23.983,101.792a1.3,1.3,0,0,0-1.229-1.347h0l-21.525.032a1.169,1.169,0,0,0-.869.4,1.41,1.41,0,0,0-.359.954L.017,115.1a1.408,1.408,0,0,0,.361.953,1.169,1.169,0,0,0,.868.394h0l21.525-.032A1.3,1.3,0,0,0,24,115.062Zm-2.58,0L12,108.967,2.58,101.824Zm-5.427,8.525,5.577,4.745-19.124.029,5.611-4.774a.719.719,0,0,0,.109-.946.579.579,0,0,0-.862-.12L1.245,114.4,1.23,102.44l10.422,7.9a.57.57,0,0,0,.7,0l10.4-7.934.016,11.986-6.04-5.139a.579.579,0,0,0-.862.12A.719.719,0,0,0,15.977,110.321Z" transform="translate(0 -100.445)"></path>
                           </g>
                        </svg>
                     </div>
                     @error('email')
                        <div class="alert alert-danger" role="alert">
                           {{ $message }}
                        </div>
                     @enderror  
                     <div class="form-group" style="margin-top: 35px;">
                        <button type="submit" class="login-btn-fill">Reset Password</button>
                     </div>
                  </form>
               </div>
               <div class="text-center foota">
                  <p>Back To <a href="{{ Route('login') }}" class="switcher-text2 inline-text">Login</a></p>
               </div>
      <!--          <div class="login-footer">
                  <p>Don't have an account?<a href="register.php" class="switcher-text2 inline-text">Register</a></p>
               </div> -->
            </div>
         </div>
      </div>
   </div>
</section>
@endsection 