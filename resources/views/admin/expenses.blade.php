@extends('partials.layout')
@extends('admin.navbar')

@section('title')
Expense
@endsection


@section('content')
<div class="container">


    <div class="row mt-5">
        <div class="col-6 mx-auto text-center">
            <form id="expenseForm">
                <input  class="form-control" placeholder="description" type="text" id="description">
                <input  class="form-control mt-3" placeholder="cost" type="number" id="cost">
                <select class="form-control mt-3" name="userId" id="userId">

                    <label class="col-sm-2 col-form-label">Expense by</label>

                    @foreach ($data['users'] as $user)
                        <option id="usernameValue" value="{{$user->id}}"> {{$user->username}}</option>
                    @endforeach
                 </select>

                <button class="btn btn-primary  mt-3" type="submit">Get User Details</button>
            </form>
        </div>
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
                <tbody id="resultOutput">
                    @foreach ($data['expenses'] as $expense)
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


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    const form_el = document.getElementById("expenseForm");
    form_el.addEventListener("submit", function(evt) {
        evt.preventDefault();
        const description = document.getElementById("description").value;
        const cost = document.getElementById("cost").value;
        const userId = document.getElementById("userId").value;
        const userName = document.getElementById("usernameValue").innerText;
        const resultOutput = document.getElementById("resultOutput");

        if(!userId || !description || !cost) {
            alert('all fields are requied');
        }
        console.log(description, cost, userId);
        axios.post('/admin/addExpense', {
            description, cost, userId
        })
        .then(function (response) {
            console.log(response.data);
            if(response.data.success) {
                const element = `
                        <tr>
                            <td>${response.data.last_insert_id}</td>
                            <td>${description}</td>
                            <td>${cost}</td>
                            <td>${userName}</td>
                         </tr>`;

                const output = resultOutput.innerHTML + element;
                resultOutput.innerHTML = output;
                form_el.reset();


            }
        })
        .catch(function (error) {
            form_el.reset();
            alert('something went wrong');
            console.log(error);

        });
    });
</script>

@endsection
