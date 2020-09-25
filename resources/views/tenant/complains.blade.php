@extends('partials.layout')
@extends('tenant.navbar')

@section('title')
Complains
@endsection


@section('content')

<div class="container">
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