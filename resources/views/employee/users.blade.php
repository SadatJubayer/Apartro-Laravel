@extends('partials.layout')
@extends('employee.navbar')

@section('title')
Users
@endsection


@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-md-10 mx-auto">
        <div class="h3 text-center my-2">List of Owners and Tenants </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Full Name</th>
                        
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Role</th>
                                               
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)


                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->firstName}} {{$user->lastName}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->role}}</td>

                        


                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection