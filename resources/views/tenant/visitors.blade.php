@extends('partials.layout')
@extends('tenant.navbar')

@section('title')
Visitors
@endsection


@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-md-10 mx-auto">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Unit Name</th>
                        <th scope="col">To Whom</th>
                        <th scope="col">Entry Date & Time</th>
                        <th scope="col">Exit Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visitors as $visitor)


                    <tr>
                        <td>{{$visitor->id}}</td>
                        <td>{{$visitor->name}}</td>
                        <td>{{$visitor->address}}</td>
                        <td>{{$visitor->phone}}</td>

                        <td>{{$visitor->unitName}}</td>
                        <td>{{$visitor->toWhom}}</td>

                        <td>{{$visitor->entryDate}} {{$visitor->entryTime}}</td>
                        <td>{{$visitor->exitDate}} {{$visitor->exitTime}}</td>


                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
