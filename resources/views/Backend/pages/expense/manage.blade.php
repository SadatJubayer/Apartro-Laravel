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
              
              <th scope="col">Description</th>
              <th scope="col">Cost</th>
              
              <th scope="col">Username</th>
              

             
            </tr>
          </thead>
          <tbody>
 

              @foreach( $expenses as $expense )
              <tr>
                <th scope="row"> {{ $expense->id }} </th>
                <th > {{ $expense->description }} </th>
                <th > {{ $expense->cost }} </th>
            
                <th > {{ $expense->user->username }} </th>
                
                    
                    
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