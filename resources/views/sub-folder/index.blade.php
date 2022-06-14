@extends('layouts.app')

@section('css')
    <!-- Data Table CSS -->
    <link href="{{ URL::asset('plugins/awselect/awselect.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="container-fluid ">
        <div class="row mt-5-7">
            <div class="col-lg-12 col-md-12 col-xm-12 mt-2">
                <div class="card border-0">

                    <div class="card-body pt-2">
                        <!-- BOX CONTENT -->
                        <div class="box-content">

                            <div class="row">

                                <div class="col-md-3 pl-0">
                                    {{-- @if (auth()->user()->role != 3) --}}
                                    <div class="card ">
                                        <div class="card-body">

                                            <div class="card-header">
                                                Add Sub folder
                                            </div>

                                            <form method="POST" action="{{ route('subfolder.store') }}"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group">
                                                    <select id="main-folder" name="main_folder_id"
                                                        data-placeholder="Select Folder" required>
                                                        @foreach ($folders as $folder)
                                                            <option value="{{ $folder->id }}">{{ $folder->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('main_folder_id')
                                                        <p class="text-danger">{{ $errors->first('main_folder_id') }}</p>
                                                    @enderror
                                                </div>

                                                <div class="input-box">

                                                    <input type="text" placeholder="Name"
                                                        class="form-control @error('folder_name') is-invalid @enderror"
                                                        name="folder_name" autocomplete="off">
                                                    @error('folder_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror

                                                </div>


                                                <div class="form-group">
                                                    <button type="submit"
                                                        class="btn btn-black mr-2">{{ __('Create') }}</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                    {{-- @endif --}}
                                </div>

                                <div class="col-md-9 border-left">
                                    <div class="card border-0">
                                        <div class="card-header">
                                            <h3 class="card-title">{{ __('Sub Folders List') }}</h3>
                                        </div>
                                        <div class="card-body pt-2">
                                            <!-- BOX CONTENT -->
                                            <div class="box-content">

                                                <!-- DATATABLE -->
                                                <table id='listSubFoldersTable' class='table listSubFoldersTable mt-5'
                                                    width='100%'>
                                                    <thead>
                                                        <tr>

                                                            <th>{{ __('Name') }}</th>
                                                            <th>{{ __('User') }}</th>
                                                            <th>{{ __('Created at') }}</th>
                                                            <th>{{ __('Actions') }}</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                <!-- END DATATABLE -->

                                            </div> <!-- END BOX CONTENT -->
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div> <!-- END BOX CONTENT -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--DELETE MODAL -->
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

    <!--EDIT MODAL -->
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
@endsection


@section('js')
    <!-- Data Tables JS -->
    <script src="{{ URL::asset('plugins/datatable/datatables.min.js') }}"></script>

    <!-- Awselect JS -->
    <script src="{{ URL::asset('plugins/awselect/awselect.min.js') }}"></script>
    <script src="{{ URL::asset('js/awselect.js') }}"></script>


    <script type="text/javascript">
        $(function() {

            "use strict";

            var table = $('#listSubFoldersTable').DataTable({
                responsive: true,
                colReorder: true,
                language: {
                    search: "<i class='fa fa-search search-icon'></i>",
                    lengthMenu: '_MENU_ ',
                    paginate: {
                        first: '<i class="fa fa-angle-double-left"></i>',
                        last: '<i class="fa fa-angle-double-right"></i>',
                        previous: '<i class="fa fa-angle-left"></i>',
                        next: '<i class="fa fa-angle-right"></i>'
                    }
                },
                pagingType: 'full_numbers',
                processing: true,
                serverSide: true,
                ajax: "{{ url('sub_folders') }}",
                columns: [{
                        data: 'name'
                    },
                    {
                        data: 'user'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'actions',
                        name: 'actions'
                    }
                ]
            });

            // DELETE CONFIRMATION MODAL
            $(document).on('click', '#deleteSubFolderButton', function(event) {
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

            // EDIT CONFIRMATION MODAL
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

        });
    </script>
@endsection
