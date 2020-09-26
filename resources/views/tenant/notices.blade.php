@extends('partials.layout')
@extends('tenant.navbar')

@section('title')
Notice form
@endsection


@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-md-10 mx-auto">
            <table class="table table-hover">
                <thead>
                    <tr>
                       
                        <th scope="col">Notice</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Apartment as $apartment)


                    <tr>
                        <td>{{$apartment->notice}}</td>

                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
