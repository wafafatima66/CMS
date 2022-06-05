@extends('layouts.auth')

@section('content')         
<div class="container-fluid ">
    <div class="row h-100vh align-items-center justify-content-center">

        <div class="col-md-4 col-sm-4 h-100 d-flex align-items-center " id="login-responsive">                
            <div class="card-body p-5 card-body-login">
                <form method="POST" action="{{ route('login') }}">
                    @csrf                                       

                    <h3 class="text-center font-weight-bold mb-8">{{ __('Welcome Back to') }} <span class=""><a href="{{ url('/') }}">{{ config('app.name') }}</a></span></h3>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-login alert-success"> 
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong><i class="fa fa-check-circle"></i> {{ $message }}</strong>
                        </div>
                        @endif

                        @if ($message = Session::get('error'))
                        <div class="alert alert-login alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong><i class="fa fa-exclamation-triangle"></i> {{ $message }}</strong>
                        </div>
                    @endif
                    
                    <div class="input-box mb-4">                             
                        <label for="email" class="fs-12 font-weight-bold text-md-right">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off" placeholder="Email Address" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror                            
                    </div>

                    <div class="input-box">                            
                        <label for="password" class="fs-12 font-weight-bold text-md-right">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off" placeholder="Password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror                            
                    </div>

                    <div class="form-group">  
                        <div class="d-flex">                        
                          
                            <div class="ml-auto">
                                @if (Route::has('password.request'))
                                    <a class="fs-12" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-0">                        
                        <button type="submit" class="btn btn-black mr-2">{{ __('Login') }}</button>                         
                    </div>


                </form>

            </div>  
               
            
            
        </div>
         
        {{-- <div class="col-md-7 col-sm-12 text-center background-special h-100 align-middle p-9" id="login-background">
            <img class="img-fluid justify-content-center" src="{{ URL::asset('img/files/login-bg.png') }}" alt="branding logo">
        </div> --}}

        <footer class="footer" id="login-footer">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 col-sm-12 fs-10 text-muted text-center">
                        Copyright © {{ date("Y") }} <a href="{{ config('app.url') }}" target="_blank">{{ config('app.name') }}</a>. {{ __('All rights reserved') }}
                    </div>
                </div>
            </div>
        </footer> 

    </div>
    
</div>
@endsection
