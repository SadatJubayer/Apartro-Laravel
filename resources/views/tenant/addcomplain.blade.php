<div class="modal-body">
                                        
       <form method="POST" action="/tenant/complainsadd">
            @csrf
         <ul class="list-group list-group-flush">
            <li class="list-group-item">
          <input type="text" name="userId" placeholder="userId" class="form-control"
                  required />
            </li>
           <li class="list-group-item">
         <input type="text" name="unitId" placeholder="unitId" class="form-control"
           required />
           </li>
            <li class="list-group-item">
            <input type="text" name="description" type="text" placeholder="description"
                class="form-control" required />
                </li>

                <li class="list-group-item">
              <input type="text" name="isresolve" placeholder="isresolve" class="form-control" />
                   </li>
                <li class="list-group-item d-flex justify-content-end">
                     <button type="submit" class="btn btn-success ml-3">
                                            Add
                                        </button>
                                    </li>
                                </ul>
                            </form>
                        </div>