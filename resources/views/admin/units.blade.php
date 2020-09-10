@extends('partials.layout')
@extends('admin.navbar')

@section('title')
Admin Home
@endsection


@section('content')

<div class="container">
    <div class="text-center my-3">
        <button data-toggle="modal" data-target="#addUnit" class="btn btn-primary" role="button">
            Add New unit
        </button>
    </div>
    <div class="col-md-6 mx-auto">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Unit Name</th>
                    <th scope="col">On Floor</th>
                    <th scope="col">Owner Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($data['units'] as $unit)

                <tr>
                    <th scope="row">{{$unit->id}}</th>
                    <td>{{$unit->unitName}}</td>
                    <td>{{$unit->floorName}}</td>
                    <td>{{$unit->ownerName}}</td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#updateFloor{{$unit->id}}"
                            class="btn btn-secondary btn-sm" role="button">Edit</a>
                        <a href="#" data-toggle="modal" data-target="#deleteUnit{{$unit->id}}"
                            class="btn btn-danger btn-sm" role="button">Delete</a>
                    </td>
                    <!-- Update Unit Modal -->
                    <div class="modal fade" id="updateFloor{{$unit->id}}" aria-labelledby="updateFloor{{$unit->id}}"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title">
                                        Update unit
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/admin/units/update" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">unit Name</label>
                                            <input type="text" name="id" value="{{$unit->id}}" class="d-none" id="" />
                                            <input required name="name" type="text" value="{{$unit->unitName}}"
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

                    <!-- delete Unit Modal -->
                    <div class="modal fade" aria-labelledby="deleteFloor{{$unit->id}}" id="deleteUnit{{$unit->id}}"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title">
                                        Are you sure to remove this unit?
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <strong>{{$unit->unitName}}</strong>
                                        </li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <form action="/admin/units/delete" method="POST">
                                        @csrf
                                        <input type="text" class="d-none" name="id" value="{{$unit->id}} " />
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
        <!-- Add Unit Modal -->
        <div class="modal fade" id="addUnit" aria-labelledby="addUnit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">
                            Add new unit
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/admin/units/new">
                            @csrf
                            <label for="floorId" class="form-label">Floor</label>
                            <select class="form-select mb-3" name="floorId" id="floorId">
                                @foreach ($data['floors'] as $floor)

                                <option value="{{$floor->id}}">
                                    {{$floor->name}}
                                </option>

                                @endforeach

                            </select>

                            <label for="ownerId" class="form-label">Owner</label>
                            <select class="form-select mb-3" name="ownerId" id="ownerId">

                                @foreach ($data['owners'] as $owner)
                                <option value=" {{$owner->id}}">
                                    {{$owner->username}}
                                </option>
                                @endforeach
                            </select>

                            <div class="mb-3">
                                <label for="name" class="form-label">Unit Name</label>
                                <input required name="name" type="text" class="form-control" id="name" />
                            </div>
                            <button type="submit" class="btn btn-success text-center">
                                Add unit
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
