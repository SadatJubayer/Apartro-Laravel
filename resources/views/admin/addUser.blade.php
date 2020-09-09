@extends('partials.layout')
@extends('admin.navbar')

@section('title')
Admin Home
@endsection


@section('content')
<div class="row mt-3">
    <div class="col-sm-8 col-md-6 col-lg-4 mx-auto border border-secondary p-4">
        <h4 class="text-center">Register a NEW User</h4>
        <!-- For Error -->
        @if($errors->any())
        <div class="alert alert-danger mt-3">
            @foreach ($errors->all() as $err)
            <strong> {{$err}} <br></strong>
            @endforeach
        </div>
        @endif

        {{-- SUccess --}}
        @isset($success)
        <div class="alert alert-success mt-3" role="alert">
            User successfuly added! You can see all users list
            <a href="/admin/users" class="alert-link">here.</a>
        </div>
        @endisset

        <form method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input name="username" type="text" class="form-control" id="username" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password" />
                <div class="form-text">
                    At least 6 characters long!
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Re-type Password</label>
                <input name="password_confirmation" type="password" class="form-control" id="password" />
            </div>

            <div class="mb-3">
                <label class="form-label">Register as</label>
                <select name="role" class="form-select">
                    <option value="tenant" selected>Tenant</option>
                    <option value="owner">Owner</option>
                    <option value="employee">Employee</option>
                </select>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="isActive" checked id="isActive" />
                <label class="form-check-label" for="isActive">
                    Pre-active the user
                </label>
            </div>

            <button type="submit" class="btn btn-secondary btn-block">
                Add user
            </button>
        </form>
    </div>
</div>

@endsection
