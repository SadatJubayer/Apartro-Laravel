@extends('partials.layout')
@extends('admin.navbar')

@section('title')
My Profile
@endsection


@section('content')
<div class="row mt-2 p-5">
    <div class="col-sm-8 col-md-4 mx-auto">
        <div class="card">
            <div class="card-header bg-info">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-white">My Profile</h5>
                    <button type="button" class="btn btn-info" id="profileEditButton">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="white"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" />
                            <path fill-rule="evenodd"
                                d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z" />
                        </svg>
                        Edit Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul id="profileInfoList" class="list-group list-group-flush">
                        @if ($user->image)
                        <li class="list-group-item">
                            <img src="/uploads/{{$user->image}}" height="150px" width="150px"
                                class="p-2 border border-info rounded-circle mx-auto d-block" alt="User image" />
                        </li>

                        @endif

                        <li class="list-group-item">
                            Username:
                            <span class="font-weight-bold">{{ $user->username}}</span>
                        </li>
                        <li class="list-group-item">
                            First Name:
                            <span class="font-weight-bold"> {{ $user->firstName}} </span>
                        </li>
                        <li class="list-group-item">
                            Last Name:
                            <span class="font-weight-bold"> {{ $user->lastName}} </span>
                        </li>
                        <li class="list-group-item">
                            E-mail:
                            <span class="font-weight-bold"> {{ $user->email}} </span>
                        </li>

                        <li class="list-group-item">
                            Gender:
                            <span class="font-weight-bold"> {{ $user->gender}} </span>
                        </li>
                        <li class="list-group-item">
                            Registered at:
                            <span class="font-weight-bold">
                                {{ $user->createdAt}}
                            </span>
                        </li>
                    </ul>


                    <ul id="profileEditForm" class="list-group list-group-flush d-none">
                        @if($errors->any())
                        <div class="alert alert-danger mt-3">
                            @foreach ($errors->all() as $err)
                            <strong> {{$err}} <br></strong>
                            @endforeach
                        </div>
                        @endif
                        <li class="list-group-item">
                            <input type="text" class='d-none' name="id" value="{{ $user->id}}" id="">
                            <input type="text" disabled value='{{ $user->username}}' name="username"
                                placeholder="username" class="form-control" />
                            <div class="form-text text-danger">You can't change your usernmae</div>
                        </li>
                        <li class="list-group-item">
                            <input type="text" value='{{ $user->firstName}}' name="firstName" placeholder="First Name"
                                class="form-control" />
                        </li>
                        <li class="list-group-item">
                            <input type="text" value='{{ $user->lastName}}' name="lastName" placeholder="Last Name"
                                class="form-control" />
                        </li>
                        <li class="list-group-item">
                            <input type="text" value='{{ $user->email}}' name="email" placeholder="E-mail"
                                class="form-control" />
                        </li>
                        <li class="list-group-item">
                            <select name="gender" class="form-select">
                                <option @if ($user->gender == 'male')
                                    selected
                                    @endif value="male">Male</option>
                                <option @if ($user->gender == 'female')
                                    selected
                                    @endif value="female">Female</option>
                                <option @if ($user->gender == 'others')
                                    selected
                                    @endif value="others">Others</option>
                            </select>
                        </li>
                        <li class="list-group-item">
                            <div class="form-file">
                                <input name="image" type="file" class="form-file-input" id="customFile">
                                <label class="form-file-label" for="customFile">
                                    <span class="form-file-text">Choose Profile Picture...</span>
                                    <span class="form-file-button">Browse</span>
                                </label>
                            </div>
                        </li>

                        <li class="list-group-item d-flex justify-content-end">
                            <button type="button" id="cancelProfileEdit" class="btn btn-danger">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-success ml-3">
                                Update
                            </button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>


</div>


@endsection
