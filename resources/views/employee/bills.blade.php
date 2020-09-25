@extends('partials.layout')
@extends('employee.navbar')

@section('title')
Expense
@endsection


@section('content')
<div class="container">
<div class="text-center my-3">
        <button data-toggle="modal" data-target="#addBill" class="btn btn-primary" role="button">
            Add New Bills
        </button>
    </div>
    <div class="row mt-5">
        <div class="col-md-10 mx-auto">
            <div class="h3 text-center my-2">All Bills </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Description</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Month</th>
                        <th scope="col">Year</th>
                        <th scope="col">For</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bills as $bill)
                    <tr>
                        <td>{{$bill->id}}</td>
                        <td>{{$bill->description}}</td>
                        <td>{{$bill->cost}}</td>
                        <td>{{$bill->month}}</td>
                        <td>{{$bill->year}}</td>
                        <td>{{$bill->billFor}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="addBill" aria-labelledby="addBill" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">
                            Add New Bill
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/employee/bills/new" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input  required name="description" type="text" class="form-control" id="description" />
                            </div>
                            <div class="mb-3">
                                <label for="cost" class="form-label">Cost</label>
                                <input  required name="cost" type="text" class="form-control" id="cost" />
                            </div>
                            <div class="mb-3">
                                <label for="month" class="form-label">Month</label>
                                <input  required name="month" type="text" class="form-control" id="month" />
                            </div>
                            <div class="mb-3">
                                <label for="year" class="form-label">Year</label>
                                <input  required name="year" type="text" class="form-control" id="year" />
                            </div>
                    
                            
                            
                            <button type="submit" class="btn btn-success text-center">
                                Add New Bills
                            </button>
                        </form>
                    </div>
           
     </div>
            
        </div>
    </div>
</div>
@endsection

