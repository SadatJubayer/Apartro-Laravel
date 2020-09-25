<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="/admin">
            <img src="{{asset('/images/logo-sm.svg')}}" height="35" alt="" loading="lazy" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
               
            <li class="nav-item">
                    <a class="nav-link" href="/tenant/users">Users</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/tenant/bills">Bills</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="/tenant/notice">Notice</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/tenant/expenses">Expenses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/tenant/visitors">Visitors</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="/admin/floors">Floors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/units">Units</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/admin/complains">Complains</a>
                </li>

                
               

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/admin/profile">My Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item bg-danger text-white" href="/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
