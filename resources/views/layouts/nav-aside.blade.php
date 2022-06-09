@section('css')
    @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&display=swap');
@endsection

<!-- SIDE MENU BAR -->
<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{ url('/') }}">
            <h1 class="mt-3" style="font-family: 'Libre Baskerville', serif; color:#000;">STOCK</h1>
            {{-- <img src="{{URL::asset('img/brand/logo-3.png')}}" class="header-brand-img desktop-lgo" alt="Admintro logo"> --}}
            <img src="{{ URL::asset('img/brand/favicon.png') }}" class="header-brand-img mobile-logo"
                alt="Admintro logo">
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


        @if (auth()->user()->role != 3)
            <div class="card-body">
                <div class="card-sub-body text-center mt-5 mb-5">
                    {{-- <a href="{{ route('folders') }}" class="btn btn-white w-100 p-3"><i class="fa fa-plus"></i>Add
                        Folder </a> --}}

                        <button class="btn btn-white w-100 p-3"  data-toggle="modal" id="addFolderButton"
                        data-target="#addFolderModal" type="button"
                        data-attr="{{ route('folder.add') }}"><i class="fa fa-plus"></i>    Add Folder</button>
                </div>
            </div>
        @endif

        @foreach ($folders as $folder)
            @if ($folder->layer == 1)
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('#') }}">

                        {{-- <span class="side-menu__icon mdi mdi-account-convert"></span> --}}

                        <button class="btn table-actions" type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" style="background: none;"><i class="fa fa-ellipsis-v"></i>
                        </button>

                        <div class="dropdown-menu table-actions-dropdown" role="menu" aria-labelledby="actions">

                            <button class="dropdown-item" id="notes"  data-attr="{{$folder->id}}" >Notes</button>

                            @if (auth()->user()->role != 3)

                            <button class="dropdown-item" data-toggle="modal" id="addSubFolderButton"
                                data-target="#addSubFolderModal" type="button"
                                data-attr="{{ route('subfolder.add', $folder->id) }}">Add Sub Folder</button>

                                <button class="dropdown-item" data-toggle="modal" id="editFolderButton"
                                data-target="#editModal" type="button"
                                data-attr="{{ route('folder.edit', $folder['id']) }}"> Edit</button>

                            <button class="dropdown-item" data-toggle="modal" id="deleteFolderButton"
                                data-target="#deleteModal" type="button"
                                data-attr="{{ route('folder.delete', $folder['id']) }}"> Delete</button>

                                @endif


                        </div>


                        <span class="side-menu__label">{{ $folder->name }}</span>

                        <i class="angle fa fa-angle-right"></i>



                    </a>

                    <ul class="slide-menu">

                        @foreach ($folders as $subfolder)
                            @if ($subfolder->layer == 2 && $subfolder->main_folder_id == $folder->id)
                                <li>
                                    <a class="slide-item">{{ $subfolder->name }}

                                       

                                        <button class="btn table-actions" type="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false" style="background: none;"><i
                                                class="fa fa-ellipsis-v"></i>
                                        </button>

                                        <div class="dropdown-menu table-actions-dropdown" role="menu"
                                            aria-labelledby="actions">

                                            <button class="dropdown-item" id="notes"  data-attr="{{$subfolder->id}}" >Notes</button>

                                            @if (auth()->user()->role != 3)

                                            <button class="dropdown-item" data-toggle="modal" id="editSubFolderButton"
                                                data-target="#editModal" type="button"
                                                data-attr="{{ route('subfolder.edit', $subfolder['id']) }}">
                                                Edit</button>

                                            <button class="dropdown-item" data-toggle="modal"
                                                id="deleteSubFolderButton" data-target="#deleteModal" type="button"
                                                data-attr="{{ route('subfolder.delete', $subfolder['id']) }}">
                                                Delete</button>

                                            @endif
                                            
                                        </div>

                                    </a>

                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>

                <hr class="slide-divider">
            @endif
        @endforeach


    </ul>
</aside>

<!--ADD MAIN FOLDER MODAL -->
<div class="modal fade" id="addFolderModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> {{ __('Add folder') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="addFolderModalBody">
                <div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!--DELETE MAIN FOLDER MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><i class="mdi mdi-alert-circle-outline color-red"></i>
                    {{ __('Confirm Folder Deletion') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="deleteModalBody">
                <div>
                    <!-- DELETE CONFIRMATION -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!--EDIT MAIN FOLDER MODAL -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> {{ __('Edit folder') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="editModalBody">
                <div>
                    <!-- DELETE CONFIRMATION -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!--ADD SUB FOLDER MODAL -->
<div class="modal fade" id="addSubFolderModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> {{ __('Add Sub folder') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="addSubFolderModalBody">
                <div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!--DELETE SUB FOLDER MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><i class="mdi mdi-alert-circle-outline color-red"></i>
                    {{ __('Confirm Folder Deletion') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="deleteModalBody">
                <div>
                    <!-- DELETE CONFIRMATION -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END MODAL -->

<!--EDIT SUB FOLDER MODAL -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> {{ __('Edit Sub folder') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="editModalBody">
                <div>
                    <!-- DELETE CONFIRMATION -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!-- END SIDE MENU BAR -->
<script src="{{ URL::asset('js/jquery-3.6.0.min.js') }}"></script>

<script>



// ADD MAIN FOLDER
$(document).on('click', '#addFolderButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        console.log(href)
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#addFolderModal').modal("show");
                $('#addFolderModalBody').html(result).show();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });


    // DELETE MAIN FOLDER CONFIRMATION MODAL
    $(document).on('click', '#deleteFolderButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#deleteModal').modal("show");
                $('#deleteModalBody').html(result).show();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });

    // EDIT MAIN FOLDER CONFIRMATION MODAL
    $(document).on('click', '#editFolderButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        console.log(href);
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#editModal').modal("show");
                $('#editModalBody').html(result).show();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });

    // ADD SUB FOLDER MODAL
    $(document).on('click', '#addSubFolderButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        console.log(href)
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#addSubFolderModal').modal("show");
                $('#addSubFolderModalBody').html(result).show();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });


    // DELETE SUB FOLDER CONFIRMATION MODAL
    $(document).on('click', '#deleteSubFolderButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        console.log(href)
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#deleteModal').modal("show");
                $('#deleteModalBody').html(result).show();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });

    // EDIT SUB FOLDER CONFIRMATION MODAL
    $(document).on('click', '#editSubFolderButton', function(event) {
        console.log($(this).attr('data-attr'))
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#editModal').modal("show");
                $('#editModalBody').html(result).show();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })
    });

    // OPEN NOTES 

    $(document).on('click', '#notes', function(event) {
        // console.log('ji')
        let folder_id = $(this).attr('data-attr');
        $.ajax({
               type:'GET',
               url:'{{url("notes")}}',
               data :{
                   folder_id : folder_id
               },
               headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
               success:function(data) {
                  $("#shownotes").html(data);
               }
            });
    });

    

</script>
