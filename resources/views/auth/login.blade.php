@extends('partials.layout')

@section('title')
Login
@endsection


@section('content')

<div class="container">

    <div class="row my-5">
        <div class="col-sm-8 col-md-6 col-lg-4 mx-auto">
            <img src="{{ asset('/images/logo.svg') }}" class="img-fluid" alt="" />
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-sm-8 col-md-6 col-lg-4 mx-auto border border-secondary p-4">
            <div class="h3 text-center">Login</div>

            @if($errors->isEmpty())
            @else
            <div class="alert alert-danger mt-3">
                <strong> {{$errors->message}} </strong>
            </div>
            @endif


            <form method="POST" action="/auth/login">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input name="username" value="" type="text" class="form-control" id="username" />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input value="" name="password" type="password" class="form-control" id="password" />
                    <div class="form-text">
                        At least 6 characters long!
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe" />
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>

                <button type="submit" class="btn btn-secondary btn-block">Submit</button>

                <div class="col align-self-center mt-3">
                    Don't have an account?
                    <a href="/auth/register" class="link-primary ml-2">
                        Register
                    </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-sm-8 col-md-6 col-lg-4 alert alert-warning mx-auto border border-warning">

            <h5 class="text-center mb-2">Populate Login Data <span class="badge badge-small bg-info">Dev only</span>
            </h5>

            <div class="d-flex  flex-wrap justify-content-around align-items-center">
                <button onclick="adminLogin()" type="button" class="btn mt-2 btn-danger">Admin</button>
                <button onclick="ownerLogin()" type="button" class="btn mt-2 btn-warning">Owner</button>
                <button onclick="tenantLogin()" type="button" class="btn mt-2 btn-dark">Tenant</button>
                <button onclick="employeeLogin()" type="button" class="btn mt-2 btn-info">Employee</button>
            </div>
        </div>
    </div>

</div>
@endsection
