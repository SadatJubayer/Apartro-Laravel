@extends('partials.layout')
@extends('admin.navbar')

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
                            <button data-toggle="modal" data-target="#resolveComplain{{$complain->id}}"
                                class="btn btn-warning btn-sm">
                                Resolve
                            </button>

                            <div class="modal fade" id="resolveComplain{{$complain->id}}"
                                aria-labelledby="ActiveComplain" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-success">
                                            <h5 class="modal-title">
                                                Are you sure to resolve this complain?
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <strong>Details: </strong>{{$complain->description}}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="/admin/complains/resolve" method="POST">
                                                @csrf
                                                <input type="text" class="d-none" name="id" value="{{$complain->id}}" />
                                                <button type="submit" class="btn btn-success">
                                                    Confirm
                                                </button>
                                            </form>
                                        </div>
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

    <div class="row mt-5">
        <div class="col-6 mx-auto text-center">
            <a class="btn btn-danger" href="/admin/getComplainsPDF">Get Issues report </a>
        </div>
    </div>

</div>
@endsection
