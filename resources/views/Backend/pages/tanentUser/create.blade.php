@extends ('backend.template.layout')

@section('main-content')
<div class="row mg-b-20">
    <div class="col-md">
      <div class="card card-body">
        <!-- Create New Category Form Start -->
        <form action="{{ route('storeTanentsusers') }}" method="POST" enctype="multipart/form-data">
            @csrf                	
            

           

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Please Insert The UserName">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" placeholder="Please Insert the password">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Please Insert Companys Facebook Link">
            </div>

            <div class="form-group">
                <label>Gender</label>
                <select name="gender" >
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                   
                  </select>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control-file">
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