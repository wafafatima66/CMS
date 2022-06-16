<div class="mt-2 d-flex">

    <div class="card-sub-body text-center">

        <button class="btn btn-white " data-toggle="" id="" data-target="" type="button" data-attr=""><i
                class="fa fa-cog mr-2"></i></button>

    </div>

    <div class="dropdown show fs-12">

        <a class="btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false"><i class="fa fa-bell mr-2"></i></a>

        @if (auth()->user()->unreadNotifications->count())
            <span class="pulse"></span>
        @endif

        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  animated">

            <div class="notify-menu">

                <div class="notify-menu-inner">

                @forelse (auth()->user()->unreadNotifications as $notification)
                {{-- @forelse ($user->unreadNotifications->where('type', '<>', 'App\Notifications\CommentNotification') as $notification ) --}}
                
                @php

                // echo $$notification ; 
                    $note_name = $notification->data['note_name'] ; 
                    $note_id = $notification->data['note_id'] ; 
                    $id = $notification->id ; 
                    // var_dump($notification->data['message'])  ;
                @endphp

                        @foreach ($notification->data['message']  as $item)

                       
                        <div class="dropdown-item border-bottom pl-4 pr-4">

                            <div>

                                <a href="" class="d-flex " id="notificationShowNote" data-attr="{{ $note_id }}" data-id="{{ $id }}">

                                    <div class="mr-6">


                                        <div class="text-muted fs-10">{{ $item }} : {{ $note_name }}</div>

                                        <div class="small text-muted fs-10">{{ $notification->created_at->diffForHumans() }}</div>

                                    </div>  

                                </a>

                            </div>

                            <div>

                                <a href="#" class="badge badge-primary mark-read mark-as-read mt-2" data-id="{{ $notification->id }}">{{ __('Mark as Read') }}</a>

                            </div>
                            
                        </div>

                        @endforeach
                   
                @empty

                <a class="dropdown-item d-flex" href="">

                    <div class="fs-12">{{ __('There are no new notifications') }}</div>

                </a>

                @endforelse

            </div>

        </div>

            </div>

    </div>

    <div class="dropdown show fs-12">

        <a class="btn btn-white dropdown-toggle  w-100 " href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">

            <i class="fa fa-user mr-2"></i> {{ Auth::user()->name }}

        </a>

        <div class="dropdown-menu w-100 dropdown-menu-right dropdown-menu-arrow  animated">

            <a class="dropdown-item d-flex" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <div class="fs-12">{{ __('Logout') }}</div>
            </a>


            @if (Auth::user()->role == 1)
                <a class="dropdown-item d-flex" href="{{ route('user.index') }}">
                    <div class="fs-12">{{ __('Users') }}</div>
                </a>
            @endif

        </div>

    </div>

    
    

</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<div id="commentbox">

    <div class="d-flex justify-content-between p-2">
        <h1 class="card-h6 text-center fs-25 pl-1 font-weight-bolder mb-0">Comments</h1>
        <span id="close-slider" class="float-right btn "><i class="fas fa-times-circle fs-25"></i></span>
    </div>


    <div class="slider-inner p-1">


        <input type="text" class="form-control fs-12" placeholder="Write Down Your Comments" id="addComments"
            data-attr=" {{ $note['id'] }}" style="border: none">
        <p id="alertComments" class="text-danger"></p>

        <div id="comments-inner">

        </div>

    </div>


</div>