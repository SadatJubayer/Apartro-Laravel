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
              <th scope="col">Month</th>
              <th scope="col">Year</th>
              <th scope="col">Username</th>
              

             
            </tr>
          </thead>
          <tbody>
 

              @foreach( $bills as $bill )
              <tr>
                <th scope="row"> {{ $bill->id }} </th>
                <th > {{ $bill->descrption }} </th>
                <th > {{ $bill->cost }} </th>
                <th > {{ $bill->month }} </th>
                <th > {{ $bill->year }} </th>
                <th > {{ $bill->user->username }} </th>
                
                    
                    
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