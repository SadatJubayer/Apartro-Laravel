@extends('partials.layout')
@extends('tenant.navbar')

@section('title')
All Users
@endsection


@section('content')


    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title text-center">All users list</h5>
        </div>
        <div class="card-body">
            
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">UserId</th>
                        <th scope="col">Ranted Unit</th>
                        <th scope="col">Rent</th>
                        <th scope="col">Nid</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($tanents as $Tanents)
                    <tr>
                        <td>{{$Tanents->id}}</td>
                        <td>{{$Tanents->uderId}}</td>
                        <td>{{$Tanents->rantedUnit}}</td>
                        <td>{{$Tanents->rent}}</td>
                        <td>{{$Tanents->nid}}</td>
                        <td>{{$Tanents->phone}}</td>
                        <td>{{$Tanents->address}}</td>
                        

                        
                    </tr>

                    @endforeach

                   



