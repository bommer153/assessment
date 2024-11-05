@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Login</h3>
                </div>
                <div class="card-body">
                     @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('Error'))
                        <div class="alert alert-danger">{{ session('Error') }}</div>
                    @endif
                    <form method="post" action="{{ route('elogin') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="inputEmail" type="email" placeholder="" name="email" />
                            <label for="inputEmail">Email</label>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" style="display: block;" role="alert" >
                                <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="inputPassword" type="password" placeholder="Password" name="password"/>
                            <label for="inputPassword">Password</label>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" style="display: block;" role="alert" >
                                <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>                       
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                           
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                     <div class="small"><a href="{{ route('registerPage') }}">Need an account? Sign up!</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection