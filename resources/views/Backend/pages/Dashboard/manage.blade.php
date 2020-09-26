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
              <th scope="col">User Name</th>
              
              <th scope="col">Unit Name</th>
              <th scope="col">Description</th>
              
              <th scope="col">Status</th>
              <th scope="col">Action</th>
              

             
            </tr>
          </thead>
          <tbody>
 

              @foreach( $complains as $complains )
              <tr>
                <th scope="row"> {{ $complains->id }} </th>
                <td > {{ $complains->user->username }} </td>
                <td > {{ $complains->unit->name }} </td>
                <td > {{ $complains->description }} </td>
                <td class="btn btn-Danger btn-sm"> @if($complains->description ==0)
                    Unsolved
                   
                    @endif
                </td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#deleteCategory{{ $complains->id }}">UpdateStatus</button>

                        <div class="modal fade" id="deleteCategory{{ $complains->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">Update Complain Status</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('complainUpdate',$complains->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Update Status</label>
                                        <select name="isResolved" class="form-control">
                                            
                                                      
                                                       
                                            <option value="0">Un Resolved</option>   
                                            <option value="1">Solved</option>   
                                            
                                                     
                                        </select>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update</button>                                    
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