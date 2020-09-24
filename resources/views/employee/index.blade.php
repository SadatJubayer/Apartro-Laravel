@extends('partials.layout')
@extends('employee.navbar')

@section('title')
Admin Home
@endsection


@section('content')

<div class="container">


    <!-- Cards -->

    <div class="row adminCards">
        <!-- Users -->
        <div class="col-lg-4">
            <div class="card bg-info text-white mt-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column align-items-center">
                        <div class="display-4 font-weight-bold">
                            {{$data['allCounts'][0]->count ?? ''}}
                        </div>
                        <h3>Total Users</h3>
                    </div>
                    <img height="80px" src="{{asset('/images/user.png')}}" alt="" />
                </div>
                <a href="/admiemployee/users" class="card-footer text-right">
                    See Details
                </a>
            </div>
        </div>


        
        

        <!-- Expenses -->
        <div class="col-lg-4">
            <div class="card bg-info text-white mt-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column align-items-center">
                        <div class="display-4 font-weight-bold">
                            {{$data['allCounts'][3]->count ?? ''}}
                        </div>
                        <h3>Total Expenses</h3>
                    </div>
                    <img height="80px" src="{{asset('/images/expenses.png')}}" alt="" />
                </div>
                <a href="/employee/expenses" class="card-footer text-right">
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
                <a href="/employee/complains" class="card-footer text-right">
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
                <a href="/employee/visitors" class="card-footer text-right">
                    See Details
                </a>
            </div>
        </div>
    </div>



</div>



@endsection