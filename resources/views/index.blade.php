@extends('partials.layout')

@section('title')
Home
@endsection

@section('content')

<div class="container bg-dark mt-5 p-5 text-white">
    <div class="row">
        <div class="col-4 mx-auto">
            <h5 class="h5 text-center">Server is Up and Running</h5>
			#server is done and running

            <a class="btn btn-block btn-danger mt-5" href="/login">Login Here</a>
        </div>
    </div>
</div>



@endsection
