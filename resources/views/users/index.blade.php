@extends('layouts.app')

@section('content')



    <div class="row h-100">

        <div class="col-lg-12 col-md-12 col-xm-12">

            <div class="card border-0">

               

                    <div class="page-header mt-5-7 pl-5 pr-5">
                        <div class="page-leftheader">
                            <h4 class="page-title mb-0">{{ __('Users List') }}</h4>
                           
                        </div>

                        <div class="page-rightheader">
                            <button class="btn btn-black mt-1"
                            data-toggle="modal" id="addUserButton" data-target="#addModalUser" type="button"
                                                    data-attr="{{ route('user.create')}}"
                            >{{ __('Create New User') }} </button>
                        </div>
                       
                    </div>

                

                <div class="card-body pt-2">
                    <!-- BOX CONTENT -->
                    <div class="box-content">

                        <!-- DATATABLE -->
                        <table class='table listUsersTable' width='100%'>

                            <thead>

                                <tr>

                                    <th width="10%">{{ __('Full Name') }}</th>

                                    <th width="10%">{{ __('Email') }}</th>

                                    <th width="10%">{{ __('Role') }}</th>

                                    <th width="5%">{{ __('Actions') }}</th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>

                                        <td>{{ $user->email }}</td>

                                        <td>

                                            @if ($user->role == 1)

                                                {{ __('Admin') }}

                                            @elseif($user->role == 2)

                                                {{ __('Editor') }}

                                            @else
                                                {{ __('Viewer') }}

                                            @endif

                                        </td>

                                        <td>

                                            <div class="dropdown">

                                                <button class="btn table-actions" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">

                                                    <i class="fa fa-ellipsis-v"></i>

                                                </button>

                                                <div class="dropdown-menu table-actions-dropdown" role="menu"
                                                    aria-labelledby="actions">

                                                    <button class="dropdown-item" data-toggle="modal"
                                                    id="editUserButton" data-target="#editModalUser" type="button"
                                                    data-attr="{{ route('user.edit', $user['id']) }}">

                                                    Edit

                                                </button>

                                                <button class="dropdown-item" data-toggle="modal"
                                                    id="deleteUserButton" data-target="#deleteModalUser" type="button"
                                                    data-attr="{{ route('user.delete', $user['id']) }}">

                                                    Delete
                                                
                                                </button>

                                                </div>

                                            </div>

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                        <!-- END DATATABLE -->

                    </div> <!-- END BOX CONTENT -->

                </div>

            </div>

        </div>

    </div>

    <!--DELETE MAIN FOLDER MODAL -->
<div class="modal fade" id="deleteModalUser" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
aria-hidden="true">

<div class="modal-dialog modal-dialog-centered modal-md" role="document">

    <div class="modal-content">

        <div class="modal-header">

            <h4 class="modal-title" id="myModalLabel"><i class="mdi mdi-alert-circle-outline color-red"></i>

                {{ __('Confirm User Deletion') }}</h4>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

            </button>

        </div>

        <div class="modal-body" id="deleteModalBodyUser">

            <div>
                <!-- DELETE CONFIRMATION -->
            </div>

        </div>

    </div>

</div>

</div>
<!-- END MODAL -->

<!--EDIT SUB FOLDER MODAL -->
<div class="modal fade" id="editModalUser" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel"> {{ __('Edit User') }}</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <div class="modal-body" id="editModalBodyUser">

                <div>
                    <!-- DELETE CONFIRMATION -->
                </div>

            </div>

        </div>

    </div>

</div>
<!-- END MODAL -->

<!--EDIT SUB FOLDER MODAL -->
<div class="modal fade" id="addModalUser" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel"> {{ __('Add User') }}</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <div class="modal-body" id="addModalBodyUser">

                <div>
                    
                </div>

            </div>

        </div>

    </div>

</div>
<!-- END MODAL -->

@endsection

<script src="{{ URL::asset('js/jquery-3.6.0.min.js') }}"></script>

<script>
        // DELETE MAIN FOLDER CONFIRMATION MODAL
        $(document).on('click', '#deleteUserButton', function(event) {

        event.preventDefault();

        let href = $(this).attr('data-attr');

        $.ajax({
            url: href,
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#deleteModalUser').modal("show");
                $('#deleteModalBodyUser').html(result).show();
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
       $(document).on('click', '#editUserButton', function(event) {

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
                $('#editModalUser').modal("show");
                $('#editModalBodyUser').html(result).show();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            },
            timeout: 8000
        })

    });

     // ADD MAIN FOLDER CONFIRMATION MODAL
     $(document).on('click', '#addUserButton', function(event) {

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
        $('#addModalUser').modal("show");
        $('#addModalBodyUser').html(result).show();
    },
    error: function(jqXHR, testStatus, error) {
        console.log(error);
        alert("Page " + href + " cannot open. Error:" + error);
        $('#loader').hide();
    },
    timeout: 8000
})

});
</script>