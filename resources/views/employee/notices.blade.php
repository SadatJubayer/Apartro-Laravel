@extends('partials.layout')
@extends('employee.navbar')

@section('title')
Notice
@endsection


@section('content')
<div class="container">
<div class="text-center my-3">
        <button data-toggle="modal" data-target="#addNotice" class="btn btn-primary" role="button">
            Post New Notice
        </button>
    </div>
    <div class="row mt-5">
        <div class="col-md-10 mx-auto">
            <div class="h3 text-center my-2">All Notices </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Apartment</th>
                        <th scope="col">Address</th>
                        <th scope="col">Notice</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notices as $notice)
                    <tr>
                        <td>{{$notice->id}}</td>
                        <td>{{$notice->name}}</td>
                        <td>{{$notice->description}}</td>
                        <td>{{$notice->notice}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="addNotice" aria-labelledby="addNotice" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">
                            Post New Notice
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/employee/notices/new" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Apartment</label>
                                <input  required name="name" type="text" class="form-control" id="name" />
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Address</label>
                                <input  required name="description" type="text" class="form-control" id="description" />
                            </div>
                            
                            <div class="mb-3">
                                <label for="notice" class="form-label">Notice</label>
                                <input  required name="notice" type="text" class="form-control" id="notice" />
                            </div>
                            
                            
                            
                            <button type="submit" class="btn btn-success text-center">
                                Post New Notice
                            </button>
                        </form>
                    </div>
           
     </div>
        </div>
    </div>
</div>
@endsection