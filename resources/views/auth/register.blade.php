@extends('partials.layout')

@section('title')
Register
@endsection


@section('content')

<div class="container">


    <div class="row my-5">
        <div class="col-sm-8 col-md-6 col-lg-4 mx-auto">
            <img src="/images/logo.svg" class="img-fluid" alt="" />
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-sm-8 col-md-6 col-lg-4 mx-auto border border-secondary p-4">
            <div class="h3 text-center">Registration</div>

            <!-- For Error -->

            @if($errors->any())
            <div class="alert alert-danger mt-3">
                @foreach ($errors->all() as $err)
                <strong> {{$err}} <br></strong>
                @endforeach
            </div>
            @endif

            {{-- <% if(typeof success != 'undefined' && success) { %>
            <div class="alert alert-success mt-3" role="alert">
                Registration successful! You can
                <a href="/auth/login" class="alert-link">login here</a> after your account
                is activated.
            </div>
            <% } %> --}}

            <form method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input value="{{old('username')}}" name="username" type="text" class="form-control" id="username" />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input value="{{old('password')}}" name="password" type="password" class="form-control"
                        id="password" />
                    <div class="form-text">
                        At least 6 characters long!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Re-type Password</label>
                    <input value="{{old('password_confirmation')}}" name="password_confirmation" type="password"
                        class="form-control" id="password" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Register as</label>
                    <select name="role" class="form-select">
                        <option value="tenant" selected>Tenant</option>
                        <option value="owner">Owner</option>
                        <option value="employee">Employee</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-secondary btn-block">Submit</button>

                <div class="col align-self-center mt-3">
                    Already have an account?
                    <a href="/login" class="link-primary ml-2">
                        Log in
                    </a>

                </div>
            </form>
        </div>
    </div>
</div>



@endsection
