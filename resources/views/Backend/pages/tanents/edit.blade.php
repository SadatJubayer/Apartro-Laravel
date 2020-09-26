@extends ('backend.template.layout')

@section('main-content')
<div class="row mg-b-20">
    <div class="col-md">
      <div class="card card-body">
        <!-- Create New Category Form Start -->
        <form action="{{ route('updateTanents',$tanent->id) }}" method="POST" enctype="multipart/form-data">
            @csrf                	
            <div class="form-group">
                <label>User Name</label>
                
                <select name="userId" >
                    <option value=""> -- Select One --</option>
                    @foreach(App\User::orderBy('id','asc')->where('role','tenant')->get() as $user)
                    <option value="{{$user->id}}" {{ $user->id == $tanent->userId ? 'selected' : '' }}>{{$user->username}}</option>
                    @endforeach
                  </select>
            </div>

            <div class="form-group">
                <label>Rented Unit</label>
                
                
                <select name="rantedUnit" >
                    <option value=""> -- Select One --</option>
                    @foreach($units as $rent)
                    <option value="{{$rent->id}}"{{ $rent->id == $tanent->rantedUnit ? 'selected' : '' }}>{{$rent->name}}</option>
                    @endforeach
                  </select>
            </div>

            <div class="form-group">
                <label>Rent</label>
            <input type="text" name="rent" class="form-control" value="{{$tanent->rent}}">
            </div>

            <div class="form-group">
                <label>NID</label>
                <input type="text" name="nid" class="form-control" value="{{$tanent->nid}}">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="{{$tanent->phone}}">
            </div>

            <div class="form-group">
                <label>Permanent Address</label>
                <input type="text" name="address" class="form-control" value="{{$tanent->address}}">
            </div>
            
            <div class="form-group">
              <input type="submit" name="addSlider" value="Add Tanent" class="btn btn-primary">
          </div>
             

        </form>
        <!-- Create New Category Form End -->
      </div><!-- card -->
    </div><!-- col -->            
  </div><!-- row -->

@endsection