@extends('layouts.auth')
@section('content')
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
                     <h2>Reset Your Password</h2>
                  </div>
                  @if (session('error'))
                     <div class="alert alert-success" role="alert">
                           {{ session('error') }}
                     </div>
                  @endif                  
                    <form method="POST" action="{{ Route('reset.updatePassword') }}">
                        @csrf 
                        <input type="hidden" name="token" value="{{ $token }}">
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
                        <div class="form-group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 16 24">
                            <g transform="translate(0)">
                                <g transform="translate(5.457 12.224)">
                                    <path d="M207.734,276.673a2.543,2.543,0,0,0-1.749,4.389v2.3a1.749,1.749,0,1,0,3.5,0v-2.3a2.543,2.543,0,0,0-1.749-4.389Zm.9,3.5a1.212,1.212,0,0,0-.382.877v2.31a.518.518,0,1,1-1.035,0v-2.31a1.212,1.212,0,0,0-.382-.877,1.3,1.3,0,0,1-.412-.955,1.311,1.311,0,1,1,2.622,0A1.3,1.3,0,0,1,208.633,280.17Z" transform="translate(-205.191 -276.673)"></path>
                                </g>
                                <path d="M84.521,9.838H82.933V5.253a4.841,4.841,0,1,0-9.646,0V9.838H71.7a1.666,1.666,0,0,0-1.589,1.73v10.7A1.666,1.666,0,0,0,71.7,24H84.521a1.666,1.666,0,0,0,1.589-1.73v-10.7A1.666,1.666,0,0,0,84.521,9.838ZM74.346,5.253a3.778,3.778,0,1,1,7.528,0V9.838H74.346ZM85.051,22.27h0a.555.555,0,0,1-.53.577H71.7a.555.555,0,0,1-.53-.577v-10.7a.555.555,0,0,1,.53-.577H84.521a.555.555,0,0,1,.53.577Z" transform="translate(-70.11)"></path>
                            </g>
                            </svg>
                            <label for="password" class="input-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
                            <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 16 24">
                               <g transform="translate(0)">
                                  <g transform="translate(5.457 12.224)">
                                     <path d="M207.734,276.673a2.543,2.543,0,0,0-1.749,4.389v2.3a1.749,1.749,0,1,0,3.5,0v-2.3a2.543,2.543,0,0,0-1.749-4.389Zm.9,3.5a1.212,1.212,0,0,0-.382.877v2.31a.518.518,0,1,1-1.035,0v-2.31a1.212,1.212,0,0,0-.382-.877,1.3,1.3,0,0,1-.412-.955,1.311,1.311,0,1,1,2.622,0A1.3,1.3,0,0,1,208.633,280.17Z" transform="translate(-205.191 -276.673)"></path>
                                  </g>
                                  <path d="M84.521,9.838H82.933V5.253a4.841,4.841,0,1,0-9.646,0V9.838H71.7a1.666,1.666,0,0,0-1.589,1.73v10.7A1.666,1.666,0,0,0,71.7,24H84.521a1.666,1.666,0,0,0,1.589-1.73v-10.7A1.666,1.666,0,0,0,84.521,9.838ZM74.346,5.253a3.778,3.778,0,1,1,7.528,0V9.838H74.346ZM85.051,22.27h0a.555.555,0,0,1-.53.577H71.7a.555.555,0,0,1-.53-.577v-10.7a.555.555,0,0,1,.53-.577H84.521a.555.555,0,0,1,.53.577Z" transform="translate(-70.11)"></path>
                               </g>
                            </svg>
                            <label for="password_confirmation" class="input-label">Confirm Password</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="********" required="required">
                            <i toggle="#password_confirmation" class="fa fa-fw fa-eye toggle-password_confirmation field-icon"></i>
                         </div>
                         @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
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