<!-- TOP MENU BAR -->
<div class="app-header header">
    <div class="container-fluid"> 
        <div class="d-flex">
            <a class="header-brand" href="{{ url('/') }}">
                <img src="{{URL::asset('img/brand/logo.png')}}" class="header-brand-img desktop-lgo" alt="Polly logo">
                <img src="{{URL::asset('img/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="Polly logo">
            </a>
            {{-- <div class="app-sidebar__toggle nav-link icon" data-toggle="sidebar">
                <a class="open-toggle" href="{{url('#')}}">
                    <span class="fa fa-align-left header-icon"></span>
                </a>
            </div> --}}
        
           

            <!-- MENU BAR -->
            <div class="d-flex order-lg-2 ml-auto"> 
               
                {{-- <div class="dropdown header-expand" >
                    <a  class="nav-link icon" id="fullscreen-button">
                        <span class="header-icon  mdi mdi-arrow-expand-all" id="fullscreen-icon"></span>
                    </a>
                </div> --}}
                    
                <div class="dropdown" >
                    <a  class="nav-link icon">
                        <i class="fa-solid fa-square-check"></i>
                        <span class="nav-link-icon-text">Tasks</span>
                    </a>
                </div> 
                
                <div class="dropdown" >
                    <a  class="nav-link icon">
                        <i class="fa-solid fa-comment"></i>
                        <span class="nav-link-icon-text">Messaging</span>
                    </a>
                </div> 


                @if ( auth()->user()->role == 1)
                <div class="dropdown" >
                    <a  class="nav-link icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span class="nav-link-icon-text">Members</span>
                    </a>
                </div> 
                @endif
                
                <div class="dropdown profile-dropdown">
                    <a href="{{url('/' . $page='#')}}" class="nav-link icon" data-toggle="dropdown">
                       
                        <i class="fa-solid fa-bars header-icon"></i>
                        <span class="nav-link-icon-text">Settings</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
                        <div class="text-center">
                            <span class="dropdown-item text-center user fs-12 pb-0 font-weight-bold">{{ Auth::user()->name }}</span>
                            <span class="text-center fs-12 text-muted">Administrator</span>
                            <div class="dropdown-divider"></div>
                        </div>
                        <a class="dropdown-item d-flex" href="">
                            <span class="profile-icon mdi mdi-account-edit"></span>
                            <div class="fs-12">{{ __('Profile') }}</div>
                        </a>
                        <a class="dropdown-item d-flex" href="">
                            <span class="profile-icon mdi mdi-account-key"></span>
                            <div class="fs-12">{{ __('Change Password') }}</div>
                        </a>
                        <a class="dropdown-item d-flex" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"> 
                            <span class="profile-icon mdi mdi-upload-network"></span>          
                            <div class="fs-12">{{ __('Logout') }}</div>                            
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <!-- END MENU BAR -->
        </div>
    </div>
</div>
<!-- END TOP MENU BAR -->
