@extends('partials.layout')
@extends('tenant.navbar')

@section('title')
Complains
@endsection


@section('content')

<div class="container">
<div class="col-6 mx-auto">
        <form action="/tenant/addComplain" method="POST">
        @csrf
            <input class="form-control mt-2" type="text" placeholder="userId" name="userId" id="">
            <input class="form-control mt-2" type="text" placeholder="unitId" name="unitId" id="">
            <input class="form-control mt-2" type="text" placeholder="description" name="description" id="">
            <input class="btn btn-danger mt-2" type="submit" value="Add Complain">
        </form>
    </div>
</div>
    <div class="row mt-5">
        <h2 class="text-center">Complains</h2>
        <div class="col-md-10 mx-auto">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Complain by</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complains as $complain)
                    <tr>
                        <td>{{$complain->id}}</td>
                        <td>{{$complain->complainBy}}</td>
                        <td>{{$complain->unitName}}</td>
                        <td>{{$complain->description}}</td>

                        <td>
                            @if ($complain->isResolved == 0)
                            <div class="badge bg-danger">Not Resolved</div>
                            

                                </div>
                                </div>
                            </div>
                            @else

                            <div class="badge bg-success">Resolved</div>
                            @endif

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

                                          
        </div>
    </div>


</div>
@endsection