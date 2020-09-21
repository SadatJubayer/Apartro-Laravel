@extends('Backend.template.layout');
@section('main-content')

<div class="row mg-b-20">
    <div class="col-md">
      <div class="card card-body">

         
        <!-- Category Table Start -->
        <table id="myTable" class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              
              <th scope="col">Notice</th>
              <th scope="col">Action</th>
              

             
            </tr>
          </thead>
          <tbody>
 

              @foreach( $apratments as $apratment )
              <tr>
                <th scope="row"> {{ $apratment->id }} </th>
                <td > {{ $apratment->name }} </td>
                <td > {{ $apratment->description }} </td>
            
                <td > {{ $apratment->notice }} </td>
                
                <td>
                    <div class="btn-group">
                        <a href="{{ route('createNotice', $apratment->id) }}" class="btn btn-success btn-sm">Create Notice</a>
                       
                    </div>

             

                </td>  
                    
                </tr>
               
              @endforeach		    

          </tbody>
        </table>
        <!-- Slider Table End -->
      </div><!-- card -->
    </div><!-- col -->            
  </div><!-- row -->


</div><!-- br-section-wrapper -->

@endsection