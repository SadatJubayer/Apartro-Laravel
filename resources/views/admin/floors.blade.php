@extends('partials.layout')
@extends('admin.navbar')

@section('title')
Floors
@endsection


@section('content')

<div class="container">
    <div class="text-center my-3">
        <button data-toggle="modal" data-target="#addFloor" class="btn btn-primary" role="button">
            Add New Floor
        </button>
    </div>
    <div class="col-md-6 mx-auto">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Floor Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($floors as $floor)

                <tr>
                    <th scope="row">{{$floor->id}}</th>
                    <td>{{$floor->name}}</td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#updateFloor{{$floor->id}}"
                            class="btn btn-secondary btn-sm" role="button">Edit</a>
                        <a href="#" data-toggle="modal" data-target="#deleteFloor{{$floor->id}}"
                            class="btn btn-danger btn-sm" role="button">Delete</a>
                    </td>
                    <!-- Update Floor Modal -->
                    <div class="modal fade" id="updateFloor{{$floor->id}}" aria-labelledby="updateFloor{{$floor->id}}"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title">
                                        Update Floor
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/admin/floors/update" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Floor Name</label>
                                            <input type="text" name="id" value="{{$floor->id}}" class="d-none" id="" />
                                            <input required name="name" type="text" value="{{$floor->name}}"
                                                class="form-control" id="name" />
                                        </div>
                                        <button type="submit" class="btn btn-warning text-center">
                                            Update
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- delete Floor Modal -->
                    <div class="modal fade" aria-labelledby="deleteFloor{{$floor->id}}" id="deleteFloor{{$floor->id}}"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title">
                                        Are you sure to remove this Floor?
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <strong>{{$floor->name}}</strong>
                                        </li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <form action="/admin/floors/delete" method="POST">
                                        @csrf
                                        <input type="text" class="d-none" name="id" value="{{$floor->id}} " />
                                        <button type="submit" class="btn btn-danger">
                                            Confirm
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>

                @endforeach
            </tbody>
        </table>
        <!-- Add Floor Modal -->
        <div class="modal fade" id="addFloor" aria-labelledby="addFloor" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">
                            Add new Floor
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/floors/new" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Floor Name</label>
                                <input required name="name" type="text" class="form-control" id="name" />
                            </div>
                            <button type="submit" class="btn btn-success text-center">
                                Add Floor
                            </button>
                        </form>
                    </div>
           
     </div>
            </div>
        </div>
    </div>
</div>
@endsection