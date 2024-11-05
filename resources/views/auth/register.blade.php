@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Sign Up</h3>
                </div>
                <div class="card-body">
                  
                    <form method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control {{ $errors->has('firstName') ? ' is-invalid' : '' }}" id="firstName" type="text"  name="firstName" value="{{ old('firstName') }}" />
                            <label for="firstName">First Name</label>
                            @if ($errors->has('firstName'))
                                <span class="invalid-feedback" style="display: block;" role="alert" >
                                <strong>{{ $errors->first('firstName') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control {{ $errors->has('lastName') ? ' is-invalid' : '' }}" id="lastName" type="text" name="lastName" value="{{ old('lastName') }}"/>
                            <label for="lastName">Last Name</label>
                            @if ($errors->has('lastName'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('lastName') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="inputEmail" type="email" name="email" value="{{ old('email') }}"/>
                            <label for="inputEmail">Email</label>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="inputPassword" type="password" name="password" />
                            <label for="inputPassword">Password</label>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>    
                        
                        <div class="form-floating mb-3">
                            <input class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="password_confirmation" type="password" name="password_confirmation"/>
                            <label for="password_confirmation">Confirm Password</label>
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>   

                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                           
                            <button class="btn btn-primary" type="submit">Register</button>
                        </div>
                    </form>
                </div>               
            </div>
        </div>
    </div>
</div>
@endsection