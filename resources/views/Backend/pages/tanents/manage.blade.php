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
              
              <th scope="col">Ranted Unit</th>
              <th scope="col">Rent</th>
              <th scope="col">NID</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
              <th scope="col">User Name</th>

             
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
 

              @foreach( $ownerUnits as $ownerUnit )
                  <tr>
                    <th scope="row"> {{ $ownerUnit->id }} </th>
                    <th > {{ $ownerUnit->unit->name }} </th>
                  
                        <th scope="row"> {{ $ownerUnit->rent }} </th>
                        <th scope="row"> {{ $ownerUnit->nid }} </th>
                        <th scope="row"> {{ $ownerUnit->phone }} </th>
                        <th scope="row"> {{ $ownerUnit->address }} </th>
                       <th scope="row"> {{ $ownerUnit->user->username }} </th>
                           
                          
                           

                  
             
                  
                    
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('editTanents', $ownerUnit->id) }}" class="btn btn-success btn-sm">Update</a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteCategory{{ $ownerUnit->id }}">Delete</button>
                        </div>

                  <!-- Modal -->
								<div class="modal fade" id="deleteCategory{{ $ownerUnit->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Do You want to delete this Solution?</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                             <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                          <form action="{{ route('deleteTanents', $ownerUnit->id ) }}" method="POST">
                                              @csrf
                                              <button type="submit" class="btn btn-danger">Delete</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
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