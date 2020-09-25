@extends('partials.layout')
@extends('admin.navbar')

@section('title')
Expense
@endsection


@section('content')
<div class="container">
<div class="text-center my-3">
        <button data-toggle="modal" data-target="#addExpense" class="btn btn-primary" role="button">
            Add New Expenses
        </button>
    </div>
    <div class="row mt-5">
        <div class="col-md-10 mx-auto">
            <div class="h3 text-center my-2">All Expenses </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Description</th>
                        <th scope="col">Cost</th>
                        <th scope="col">By</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expenses as $expense)
                    <tr>
                        <td>{{$expense->id}}</td>
                        <td>{{$expense->description}}</td>
                        <td>{{$expense->cost}}</td>
                        <td>{{$expense->expenseBy}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="addExpense" aria-labelledby="addExpense" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">
                            Add New Expense
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/employee/expenses/new" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input  required name="description" type="text" class="form-control" id="description" />
                            </div>
                            <div class="mb-3">
                                <label for="cost" class="form-label">Cost</label>
                                <input  required name="cost" type="text" class="form-control" id="cost" />
                            </div>
                            
                            
                            <button type="submit" class="btn btn-success text-center">
                                Add New Expenses
                            </button>
                        </form>
                    </div>
           
     </div>
            
        </div>
    </div>
</div>
@endsection

