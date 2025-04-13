<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo">
            {{-- <i class="fas fa-wallet logo-icon"></i> --}}
            <span>GST-Personnel</span>
        </div>
        <div class="d-img">
            <img src="{{ Auth::user()->getProfileLive() }}" style="object-fit:cover;" alt="{{ Auth::user()->name }}">
        </div>
        <div class="d-text text-center text-muted">
            <span>{{ Auth::user()->name }}</span><br>
            <span>{{ Auth::user()->email }}</span>
        </div>
    </div>
    <nav class="nav">
        <div class="top">
            <a href="{{url('panel/dashboard')}}" class="{{ (Request::segment(2) == 'dashboard') ? 'active' : '' }} nav-item">
                <i class="fas fa-home"></i>
                <span>Tableau de bord</span>
            </a>
     
            {{-- uniquequment les admin et super admin qui peuvent accédé a ça --}}
            @if (Auth::user()->role == 1)
            <a href="{{url('panel/admin')}}" class="{{ (Request::segment(2) == 'admin') ? 'active' : '' }} nav-item">
                <i class="fas fa-user"></i>
                <span>Admin</span>
            </a>

            <a href="{{url('panel/employe')}}" class="{{ (Request::segment(2) == 'employe') ? 'active' : '' }} nav-item">
                <i class="fas fa-user-group"></i>
                <span>employe</span>
            </a>

            <a href="{{url('panel/job')}}" class="{{ (Request::segment(2) == 'job') ? 'active' : '' }} nav-item">
                <i class="fas fa-exchange-alt"></i>
                <span>Job</span>
            </a>

            <a href="{{url('panel/department')}}" class="{{ (Request::segment(2) == 'department') ? 'active' : '' }} nav-item">
                <i class="fas fa-wallet"></i>
                <span>Department</span>
            </a>
            @endif

            
           
            <a href="#" class="nav-item">
                <i class="fas fa-tags"></i>
                <span>Catégories</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-bullseye"></i>
                <span>Objectifs</span>
            </a>
            <a href="#" class="nav-item">
                <i class="fas fa-file-export"></i>
                <span>Rapports</span>
            </a>
            {{-- <a href="#" class="nav-item">
                <i class="fas fa-cog"></i>
                <span>Paramètres</span>
            </a> --}}
        </div>
        <div class="bottom">
            <a href="{{url('logout')}}" class="nav-item">
                <i class="fa fa-sign-out"></i>
                <span>Log out</span>
            </a>
        </div>
    </nav>
  
</aside>