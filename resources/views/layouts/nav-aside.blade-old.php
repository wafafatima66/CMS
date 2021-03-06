@section('css')
@import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&display=swap');
@endsection

<!-- SIDE MENU BAR -->
<aside class="app-sidebar"> 
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{url('/')}}">
          <h1 class="mt-3" style="font-family: 'Libre Baskerville', serif; color:#000;">STOCK</h1>
            {{-- <img src="{{URL::asset('img/brand/logo-3.png')}}" class="header-brand-img desktop-lgo" alt="Admintro logo"> --}}
            <img src="{{URL::asset('img/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="Admintro logo">
        </a>
    </div>

     

    <ul class="side-menu app-sidebar3">

         <!-- SEARCH BAR -->
      <div id="search-bar">                
        <div>
            <a class="nav-link icon">
                <form id="search-field" action="" method="POST" enctype="multipart/form-data">         
                    @csrf                   
                    <input type="search" name='keyword' placeholder="Search Notes">
                </form>                        
            </a>
        </div>                
    </div>
        <!-- END SEARCH BAR -->
      <hr class="slide-divider">
    

      <div class="card-body">
        <div class="card-sub-body text-center mt-5 mb-5">
            <a href="{{ url('/') }}" class="btn btn-white w-100 p-3"><i class="fa fa-plus"></i>Notes</a>
        </div>
    </div>

    <hr class="slide-divider">

        {{-- @role('admin') --}}
            {{-- <li class="side-item side-item-category mt-4">{{ __('Folders') }}</li> --}}

            @if ( auth()->user()->role != 3)
            <div class="card-body">
                <div class="card-sub-body text-center mt-5 mb-5">
                    <a href="{{ route('folders') }}" class="btn btn-white w-100 p-3"><i class="fa fa-plus"></i>Add Folder</a>
                </div>
            </div>
            @endif

            {{-- <li class="side-item side-item-category mt-4">{{ __('Main Folders') }}</li> --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                    <span class="side-menu__icon mdi mdi-account-convert"></span>
                    <span class="side-menu__label">{{ __('Main Folders') }}</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        @foreach ($folders as $folder)
                        @if ($folder->layer == 1)
                        <li><a href="{{ url('/folders') }}" class="slide-item">{{ $folder->name }}</a></li>
                        @endif
                        @endforeach
                    </ul>
            </li>

            <hr class="slide-divider">
            {{-- <li class="side-item side-item-category">{{ __('Sub Folders') }}</li> --}}

            @if ( auth()->user()->role != 3)
            <div class="card-body">
                <div class="card-sub-body text-center mt-5 mb-5">
                    <a href="{{ route('subfolders') }}" class="btn btn-white w-100 p-3"><i class="fa fa-plus"></i>  Add SubFolder</a>
                </div>
            </div>
            @endif

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                    <span class="side-menu__icon mdi mdi-account-convert"></span>
                    <span class="side-menu__label">{{ __('Sub Folders') }}</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        {{-- <li><a href="/po" class="slide-item">{{ __('Sub Folder 1') }}</a></li>
                        <li><a href="/if" class="slide-item">{{ __('Sub Folder 2') }}</a></li>
                        <li><a href="/ur" class="slide-item">{{ __('Sub Folder 3') }}</a></li> --}}
                        @foreach ($folders as $folder)
                        @if ($folder->layer == 2)
                        <li><a href="{{ url('/sub_folders') }}" class="slide-item">{{ $folder->name }}</a></li>
                        @endif
                        @endforeach
                    </ul>
            </li>
            
    </ul>
</aside>


<!-- END SIDE MENU BAR -->