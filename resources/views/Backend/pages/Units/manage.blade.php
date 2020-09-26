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
              <th scope="col">Apartment Name </th>
              {{-- <th scope="col">Notice</th> --}}
              <th scope="col">Floor Name</th>
              <th scope="col">Action </th>
              
             

            </tr>
          </thead>
          <tbody>
 

              @foreach( $units as $unit )
                  <tr>
                    <th scope="row"> {{ $unit->id }} </th>
                  
                    <td>{{ $unit->name  }}</td>
                    {{-- <td>{{ $unit->notice }}</td> --}}
                    <td>{{ $unit->floor->name }}</td>
                    {{-- <td>{{ $unit->tanent['rent'] }}</td> --}}
                   
                
                    

                    
                    
                  
                   
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('editUnits', $unit->id) }}" class="btn btn-success btn-sm">Edit</a>
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