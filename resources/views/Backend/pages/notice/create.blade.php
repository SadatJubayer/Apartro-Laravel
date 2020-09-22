@extends ('backend.template.layout')

@section('main-content')
<div class="row mg-b-20">
    <div class="col-md">
      <div class="card card-body">
        <!-- Create New Category Form Start -->
        <form action="{{ route('storeNotice', $apartment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf                	
            <div class="form-group">
                <label>Description 1</label>
                <textarea class="form-control" id="summary-ckeditor" name="notice" ></textarea>
            </div>

         
           
            <div class="form-group">
                <input type="submit" name="addSlider" value="Create Notice" class="btn btn-primary">
            </div>

            

    
        </form>
        <!-- Create New Category Form End -->
      </div><!-- card -->
    </div><!-- col -->            
  </div><!-- row -->

@endsection