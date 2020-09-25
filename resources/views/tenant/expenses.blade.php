@extends('partials.layout')
@extends('tenant.navbar')

@section('title')
Expense
@endsection


@section('content')
<div class="container">
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
        </div>
    </div>
</div>
@endsection
