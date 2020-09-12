@extends('partials.layout')
@extends('admin.navbar')

@section('title')
Edit Appartment
@endsection


@section('content')


<div class="row mt-4">
    <div class="col-sm-6 mx-auto">
        <div class="card">
            <div class="card-header bg-info">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-white">Update Apartment Info</h5>
                </div>
            </div>
            <div class="card-body">

                @if($errors->any())
                <div class="alert alert-danger mt-3">
                    @foreach ($errors->all() as $err)
                    <strong> {{$err}} <br></strong>
                    @endforeach
                </div>
                @endif

                <!-- Edit Apartment -->
                <form method="POST">
                    @csrf
                    <ul id="apartmentInfoForm" class="list-group list-group-flush">
                        <li class="list-group-item">
                            <input type="text" name="name" value="{{$apartment->name}}" placeholder="Apartment name"
                                class="form-control" />
                        </li>
                        <li class="list-group-item">
                            <input name="description" value="{{$apartment->description}}" type="text"
                                placeholder="Description" class="form-control" />
                        </li>

                        <li class="list-group-item">
                            <input type="text" name="notice" value="{{$apartment->notice}}" placeholder="Notice"
                                class="form-control" />
                        </li>
                        <li class="list-group-item d-flex justify-content-end">
                            <button onclick="location.href='/admin/'" type="button" id="cancelApartEdit"
                                class="btn btn-danger">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-success ml-3">
                                Update
                            </button>
                        </li>
                    </ul>



                </form>
           
 </div>
        </div>
    </div>
</div>
@endsection