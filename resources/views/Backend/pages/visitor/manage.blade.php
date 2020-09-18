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
              <th scope="col">Address</th>
              <th scope="col">Phone</th>
              <th scope="col">Entry Time</th>
              <th scope="col">Exit Time </th>
              <th scope="col">Entry Date  </th>
              <th scope="col">Exit Date  </th>
            

            </tr>
          </thead>
          <tbody>
 

              @foreach( $visitors as $visitor )
                  <tr>
                    <th scope="row"> {{ $visitor->id }} </th>
                    <td>{{ $visitor->name }}</td>
                    <td>{{ $visitor->address }}</td>
                    <td>{{ $visitor->phone }}</td>
                    <td>{{ $visitor->entryTime}}</td>
                    <td>{{ $visitor->exitTime}}</td>
                    <td>{{ $visitor->entryDate}}</td>
                    <td>{{ $visitor->exitDate}}</td>
                   
                    

                    
                    
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