<aside class="left-sidebar" data-sidebarbg="skin5">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
      <!-- Sidebar navigation-->

      {{-- Category Management Menu --}}
      <nav class="sidebar-nav">
          <ul id="sidebarnav" class="p-t-30">
            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Units</span></a>
                <ul aria-expanded="false" class="collapse  first-level">
                <li class="sidebar-item"><a href="{{route('getUnits')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Manage Units</span></a></li>
                </ul>
            </li>

            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Tenants</span></a>
              <ul aria-expanded="false" class="collapse  first-level">
              <li class="sidebar-item"><a href="{{route('createTanent')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Create Tenants</span></a></li>
              <li class="sidebar-item"><a href="{{route('manageTanent')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Manage Tenants</span></a></li>
              </ul>
          </li>
            
          <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Create Tenant</span></a>
            <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{route('createTanentsusers')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Create Tanent Users</span></a></li>
            </ul>
        </li>

        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Visitors</span></a>
          <ul aria-expanded="false" class="collapse  first-level">
          <li class="sidebar-item"><a href="{{route('visitors')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> See Visitors</span></a></li>
          </ul>
      </li>

      <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Bills</span></a>
        <ul aria-expanded="false" class="collapse  first-level">
        <li class="sidebar-item"><a href="{{route('manageBills')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> See Bills</span></a></li>
        </ul>
    </li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Expenses</span></a>
          <ul aria-expanded="false" class="collapse  first-level">
          <li class="sidebar-item"><a href="{{route('manageExpense')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> See Expenses</span></a></li>
          </ul>
      </li>
      <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Notices</span></a>
        <ul aria-expanded="false" class="collapse  first-level">
        <li class="sidebar-item"><a href="{{route('manageNotice')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Manage Notices</span></a></li>
        {{-- <li class="sidebar-item"><a href="{{route('createNotice')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Create Notices</span></a></li> --}}
        </ul>
      </li>

      
      <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Units Data</span></a>
        <ul aria-expanded="false" class="collapse  first-level">
        <li class="sidebar-item"><a href="{{route('getReport')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Get Units Data</span></a></li>
        {{-- <li class="sidebar-item"><a href="{{route('createNotice')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Create Notices</span></a></li> --}}
        </ul>
      </li>
        
   </ul>
     
          
              
              
          
      </nav>
      <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>


