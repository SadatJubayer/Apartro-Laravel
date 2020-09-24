@extends('partials.layout')
@extends('employee.navbar')

@section('title')
Visitors
@endsection


@section('content')

<div class="container">
    <div class="text-center my-3">
        <button data-toggle="modal" data-target="#addVisitor" class="btn btn-primary" role="button">
            Add New Visitors
        </button>
    </div>
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
            <div class="modal fade" id="addVisitor" aria-labelledby="addVisitor" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">
                            Add new Visitor
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/employee/visitors/new" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Visitors Name</label>
                                <input required name="name" type="text" class="form-control" id="name" />
                            </div>
                            <button type="submit" class="btn btn-success text-center">
                                Add New Visitors
                            </button>
                        </form>
                    </div>
           
     </div>
        </div>
    </div>
</div>

@endsection
