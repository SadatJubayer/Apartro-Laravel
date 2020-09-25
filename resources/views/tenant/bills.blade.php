@extends('partials.layout')
@extends('tenant.navbar')

@section('title')
Bill form
@endsection


@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-md-10 mx-auto">
            <table class="table table-hover">
                <thead>
                    <tr>
                       
                        <th scope="col">ID</th>
                        <th scope="col">Descrption</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Month</th>
                        <th scope="col">Year</th>
                        <th scope="col">UserID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Bills as $bills)


                    <tr>
                        <td>{{$bills->id}}</td>
                        <td>{{$bills->descrption}}</td>
                        <td>{{$bills->cost}}</td>
                        <td>{{$bills->month}}</td>

                        <td>{{$bills->year}}</td>
                        <td>{{$bills->userId}}</td>

                        

                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
