@extends('partials.layout')
@extends('tenant.navbar')

@section('title')
All Users
@endsection


@section('content')
<div class="container mt-5">
    <div class="row my-3">
        <div class="col-2">
            <a href="/admin/users/add" class="btn btn-primary">Add New User</a>
        </div>
        <div class="col-8">
            <input type="text" id="searchText" onkeyup="searchUser(this)" class="form-control"
                placeholder="Search users..." />
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title text-center">All users list</h5>
        </div>
        <div class="card-body">
            @if (count($users) > 0)
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">User Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)

                    <tr>
                        <td>
                            {{$user->id}}
                        </td>
                        <td>
                            {{$user->username}}
                        </td>
                        <td>
                            {{$user->firstName}}
                            {{$user->lastName}}

                        </td>
                        <td>
                            {{$user->role}}
                        </td>
                        <td>

                            @if ($user->isActive)
                            <a href="#" data-toggle="modal" data-target="#deActiveUser{{$user->id}}" class="btn btn-danger btn-sm @if ($user->role == 'admin')
                                disabled
                                @endif" role="button">Deactive</a>
                            @else
                            <a href="#" data-toggle="modal" data-target="#activeUser{{$user->id}}"
                                class="btn btn-success btn-sm" role="button">Active</a>
                            @endif

                        </td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#viewUser{{$user->id}}"
                                class="btn btn-primary btn-sm" role="button">View</a>
                            <a href="#" data-toggle="modal" data-target="#updateUser{{$user->id}}"
                                class="btn btn-warning btn-sm" role="button">Edit</a>
                            <a href="#" data-toggle="modal" data-target="#deleteUser{{$user->id}}"
                                class="btn btn-danger btn-sm @if ($user->role == 'admin') disabled @endif"
                                role="button">Delete</a>
                        </td>
                    </tr>
                    <!-- Active user Modal -->
                    <div class="modal fade" id="activeUser{{$user->id}}" aria-labelledby="activeUser"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-success">
                                    <h5 class="modal-title">Are you sure to active this user?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            Username: {{$user->username}}
                                        </li>
                                        <li class="list-group-item">
                                            Date of registration:
                                            {{$user->createdAt}}
                                        </li>
                                        <li class="list-group-item">Gender: {{$user->gender}}</li>
                                        <li class="list-group-item">Email: {{$user->email}}</li>
                                        <li class="list-group-item">User type: {{$user->role}}</li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <form action="/admin/users/activeUser" method="POST">
                                        @csrf
                                        <input type="text" class="d-none" name="username" value="{{$user->username}}" />
                                        <button type="submit" class="btn btn-success">
                                            Confirm
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- deActive user Modal -->
                    <div class="modal fade" id="deActiveUser{{$user->id}}" aria-labelledby="deActiveUser"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-warning text-white">
                                    <h5 class="modal-title">
                                        Are you sure to deactive this user?
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            Username: {{$user->username}}
                                        </li>
                                        <li class="list-group-item">
                                            Date of registration: {{$user->createdAt}}
                                        </li>
                                        <li class="list-group-item">Gender: {{$user->gender}}</li>
                                        <li class="list-group-item">Email: {{$user->email}}</li>
                                        <li class="list-group-item">User type: {{$user->role}}</li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <form action="/admin/users/deActiveUser" method="POST">
                                        @csrf
                                        <input type="text" class="d-none" name="username" value="{{$user->username}}" />
                                        <button type="submit" class="btn btn-danger">
                                            Confirm
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Update user Modal -->
                    <div class="modal fade" id="updateUser{{$user->id}}" aria-labelledby="updateUser"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-warning text-white">
                                    <h5 class="modal-title">
                                        Update User
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/admin/users/updateUser">
                                        @csrf
                                        <input type="text" name="id" value="{{$user->id}}" class="d-none" id="" />

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input name="username" type="text" class="form-control" id="username"
                                                value="{{$user->username}}" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="firstName" class="form-label">First Name</label>
                                            <input name="firstName" type="text" class="form-control" id="firstName"
                                                value=" {{$user->firstName}}" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="lastName" class="form-label">Last Name</label>
                                            <input name="lastName" type="text" class="form-control" id="lastName"
                                                value="{{$user->lastName}}" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">E-mail</label>
                                            <input name="email" type="email" class="form-control" id="email"
                                                value="{{$user->email}}" />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">User type</label>
                                            <select name="role" class="form-select">
                                                <option @if ($user->role == 'tenant')
                                                    selected
                                                    @endif value="tenant">Tenant</option>
                                                <option @if ($user->role == 'owner')
                                                    selected
                                                    @endif value="owner">Owner</option>
                                                <option @if ($user->role == 'employee')
                                                    selected
                                                    @endif value="employee">Employee</option>
                                                <option @if ($user->role == 'admin')
                                                    selected
                                                    @endif value="admin">Admin</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Gender</label>
                                            <select name="gender" class="form-select">
                                                <option @if ($user->gender == 'male')
                                                    selected
                                                    @endif value="male">Male</option>
                                                <option @if ($user->gender == 'female')
                                                    selected
                                                    @endif value="female">Female</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-warning btn-block">
                                            Update
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- delete user Modal -->
                    <div class="modal fade" id="deleteUser{{$user->id}}" aria-labelledby="deleteUser"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title">
                                        Are you sure to remove this user?
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            Username: {{ $user->username }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <form action="/admin/users/destroyUser" method="POST">
                                        @csrf
                                        <input type="text" class="d-none" name="username"
                                            value="{{ $user->username }}" />
                                        <button type="submit" class="btn btn-danger">
                                            Confirm
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- View user Modal -->
                    <div class="modal fade" id="viewUser{{$user->id}}" aria-labelledby="deActiveUser"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h5 class="modal-title">
                                        User Info
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">ID: {{$user->id}}</li>
                                        <li class="list-group-item">
                                            Username: {{$user->username}}
                                        </li>
                                        <li class="list-group-item">
                                            Date of registration: {{$user->createdAt}}
                                        </li>
                                        <li class="list-group-item">Gender: {{$user->gender}}</li>
                                        <li class="list-group-item">
                                            Active: @if ($user->isActive)
                                            <div class="badge bg-success">Active</div>
                                            @else
                                            <div class="badge bg-danger">Not Active</div>
                                            @endif

                                        </li>
                                        <li class="list-group-item">Email: {{$user->email}}</li>
                                        <li class="list-group-item">User type: {{$user->role}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-center text-danger">No users found</p>
            @endif
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>

const searchUser = (e) => {
    axios
        .post('/admin/users/search', {
            term: e.value,
        })
        .then(function(response) {
            console.log(response);
        })
        .catch(function(error) {
            console.log(error);
        });
};
</script>


@endsection