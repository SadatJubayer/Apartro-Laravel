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
              

             
            </tr>
          </thead>
          <tbody>
 

              @foreach( $apratments as $apratment )
              <tr>
                <th scope="row"> {{ $apratment->id }} </th>
                <th > {{ $apratment->name }} </th>
                <th > {{ $apratment->description }} </th>
            
                <th > {{ $apratment->notice }} </th>
                
                    
                    
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