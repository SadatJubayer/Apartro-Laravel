@extends('partials.layout')
@extends('tenant.navbar')

@section('title')
Tenant Home
@endsection


@section('content')

<div class="container">
    <!-- Welcome box -->
    <div class="alert alert-success mt-5" role="alert">
        <p>Welcome Tenant! You can control your apartment from here.</p>
        <hr />

        @if (@isset($data['apartment']->name))
        <div class="apartment-info">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="alert-heading">
                    {{$data['apartment']->name ?? ''}}
                </h3>
                <button onclick="location.href='/tenant/editApartment';" type="button" class="btn bg-success text-white"
                    id="apartEditBtn">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="white"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM {{$data['allCounts'][0]->count ?? ''}} 2l2 2-9 9-3 1 1-3 9-9z" />
                        <path fill-rule="evenodd"
                            d="M {{$data['allCounts'][0]->count ?? ''}}.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z" />
                    </svg>
                    Edit Data
                </button>
            </div>

            <p class="alert-heading mt-3">
                <br />
                <span class="font-weight-bold">Address: </span> {{$data['apartment']->description ?? ''}}
            </p>
            <p class="alert-heading">
                <span class="font-weight-bold">Current notice: </span>
                {{$data['apartment']->notice ?? ''}}
            </p>
        </div>
        @else
        <div class="modal-container">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addApartment">Add Apartment</button>

            <div class="modal" class="modal fade" id="addApartment">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Apartment</h5>
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/admin/addApartment">
                                @csrf
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <input type="text" name="name" placeholder="Apartment name" class="form-control"
                                            required />
                                    </li>
                                    <li class="list-group-item">
                                        <input name="description" type="text" placeholder="Description"
                                            class="form-control" required />
                                    </li>

                                    <li class="list-group-item">
                                        <input type="text" name="notice" placeholder="Notice" class="form-control" />
                                    </li>
                                    <li class="list-group-item d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success ml-3">
                                            Add
                                        </button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif




    </div>

    <!-- Cards -->

    <div class="row adminCards">
        <!-- Notice -->
        <div class="col-lg-4">
            <div class="card bg-info text-white mt-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column align-items-center">
                        <div class="display-4 font-weight-bold">
                            {{$data['allCounts'][0]->count ?? ''}}
                        </div>
                        <h3>Notice</h3>
                    </div>
                    <img height="80px" src="{{asset('/images/user.png')}}" alt="" />
                </div>
                <a href="/tenant/notice" class="card-footer text-right">
                    See Details
                </a>
            </div>
        </div>


        <!-- Visitors -->
        <div class="col-lg-4">
            <div class="card bg-info text-white mt-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column align-items-center">
                        <div class="display-4 font-weight-bold">
                            {{$data['allCounts'][1]->count ?? ''}}
                        </div>
                        <h3>Visitors</h3>
                    </div>
                    <img height="80px" src="{{asset('/images/floor.png')}}" alt="" />
                </div>
                <a href="/tenant/visitors" class="card-footer text-right">
                    See Details
                </a>
            </div>
        </div>
       
        <!-- Total expenses -->
        <div class="col-lg-4">
            <div class="card bg-info text-white mt-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column align-items-center">
                        <div class="display-4 font-weight-bold">
                            {{$data['allCounts'][2]->count ?? ''}}
                        </div>
                        <h3> Total Expenses</h3>
                    </div>
                    <img height="80px" src="{{asset('/images/unit.png')}}" alt="" />
                </div>
                <a href="/tenant/expenses" class="card-footer text-right">
                    See Details
                </a>
            </div>
        </div>

        <!-- total Bills -->
        <div class="col-lg-4">
            <div class="card bg-info text-white mt-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column align-items-center">
                        <div class="display-4 font-weight-bold">
                            {{$data['allCounts'][3]->count ?? ''}}
                        </div>
                        <h3>Total Bills</h3>
                    </div>
                    <img height="80px" src="{{asset('/images/expenses.png')}}" alt="" />
                </div>
                <a href="/tenant/bills" class="card-footer text-right">
                    See Details
                </a>
            </div>
        </div>

        <!-- Complains -->
        <div class="col-lg-4">
            <div class="card bg-info text-white mt-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column align-items-center">
                        <div class="display-4 font-weight-bold">
                            {{$data['allCounts'][4]->count ?? ''}}
                        </div>
                        <h3>Total Complains</h3>
                    </div>
                    <img height="80px" src="{{asset('/images/complain.png')}}" alt="" />
                </div>
                <a href="/tenant/complains" class="card-footer text-right">
                    See Details
                </a>
            </div>
        </div>
        <!-- Visitors -->
        <div class="col-lg-4">
            <div class="card bg-info text-white mt-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column align-items-center">
                        <div class="display-4 font-weight-bold">
                            {{$data['allCounts'][5]->count ?? ''}}
                        </div>
                        <h3>Total Visitors</h3>
                    </div>
                    <img height="80px" src="{{asset('/images/visitor.png')}}" alt="" />
                </div>
                <a href="/tenant/visitors" class="card-footer text-right">
                    See Details
                </a>
            </div>
        </div>
    </div>



</div>



@endsection