@extends('layouts.app')

@section('css')
    <!-- Data Table CSS -->
    <link href="{{ URL::asset('plugins/awselect/awselect.min.css') }}" rel="stylesheet" />
    <!-- RichText CSS -->
    <link href="{{ URL::asset('plugins/richtext/richtext.min.css') }}" rel="stylesheet" />
@endsection

@section('content')

@error('note_title')

<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('note_title') }}</strong>
</div>

@enderror

    <div class="container-fluid h-100 pb-0">

        <div class="row h-100">

            <div class="col-lg-12 col-md-12 col-xm-12 pl-0 pr-0">

                <div class="card border-0 card-no-radius">

                    <div class="card-body pt-2">
                        <!-- BOX CONTENT -->
                        <div class="box-content">

                            <div class="row">

                                <div class="col-md-3 pl-0" id="shownotes">

                                   

                                </div>

                                <div class="col-md-9 border-left">

                                    <div id="create-note-div" style="display: none">

                                        <form action="{{ route('notes.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        
                                            <div class="border-bottom d-flex justify-content-between">
                                        
                                                <h1 class="card-h6 text-left mt-2 fs-15"> <span id="note-folder-name"> Notes</span>  > <span id="note-subfolder-name">Note Title</span>  </h1>

                                             {{-- include here --}}
                                                {{-- @include('notes.top-rightnav') --}}

                                               
                                        
                                                {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form> --}}

                                                

                                            </div>
                                        
                                            <div class="card-h6 fs-25 d-flex">
                                        
                                                <span id="note-title">

                                                    Note Title

                                                </span>

                                                <span class="ml-5" id="edit-note-title">
                                                    <i class="fas fa-edit fs-15"></i>
                                                </span>

                                                <input type="hidden" name="note_title" id="new-note-title">
                                                <input type="hidden" name="folder_id" id="getfolderid">
                                        
                                            </div>
                                        
                                            <div class="card-body">
                                        
                                                <div class="row">
                                                    <div class="col-2">
                                                        <p>Created By : </p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p class="font-weight-700">{{ Illuminate\Support\Str::ucfirst(Auth::user()->name ) }}</p>
                                                    </div>
                                                </div>
                                        
                                                <div class="row">
                                                    <div class="col-2">
                                                        <p>Last Modified : </p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p class="font-weight-700">{{ date('F j, Y, g:i a', strtotime('today UTC')) }}</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        
                                            @if (auth()->user()->role != 3)
                                                <div class="input-box mt-3">
                                        
                                                    <textarea class="form-control" name="content" rows="12" id="richtext" required>{{ old('content') }}</textarea>

                                                    @error('content')
                                                        <p class="text-danger">{{ $errors->first('content') }}</p>
                                                    @enderror
                                        
                                                </div>
                                                @endif
                                        
                                                <div class="border-0 text-right mb-2 mt-1">
                                        
                                                    <button type="submit" class="btn btn-black">{{ __('Update') }}</button>
                                        
                                                </div>
                                        
                                        </form>

                                    </div>

                                    <div id="view-note-div">

                                    </div>

                                </div>

                            </div>


                        </div> <!-- END BOX CONTENT -->

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!--DELETE NOTE MODAL -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="mdi mdi-alert-circle-outline color-red"></i>
                        {{ __('Confirm Note Deletion') }}</h4>
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

    <!--WARNING MODAL -->
    <div class="modal fade" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="mdi mdi-alert-circle-outline color-red"></i>
                        {{ __('No folder is selected ! ') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="warningModalBody">
                    <div>
                        <div class="modal-body">        
                            <p>{{ __('Select a folder or a sub folder !') }}</p>   
                            
                            {{-- <select id="folder_id_from_modal" class="form-control mt-2 fs-10" >
                                <option value="">Select Folder</option>

                            @foreach ($folders as $folder)

                                @if ($folder->main_folder_id != 0)
                                    <option value="{{ $folder->id }}">{{ $folder->name }}</option> 
                                @endif
                                
                            @endforeach

                            </select>  --}}

                            <select class="custom-select form-control mt-2 fs-10" id="folder_id_from_modal">
                        
                                <option value="">Select Folder</option>

                                @foreach ($folders as $folder)
                                @if ($folder->layer == 1)

                                <optgroup label="{{ $folder->name }}">


                                    @foreach ($folders as $subfolder)
                                @if ($subfolder->layer == 2 && $subfolder->main_folder_id == $folder->id)

                                <option value="{{ $subfolder->id }}-{{ $subfolder->name }}-{{ $folder->name }}">{{ $subfolder->name }}</option>

                                @endif
                                @endforeach

                                </optgroup>
                                @endif
                                @endforeach
                              </select>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-cancel mr-2" data-dismiss="modal">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->
@endsection



@section('js')
    <!-- Awselect JS -->
    <script src="{{ URL::asset('plugins/awselect/awselect.min.js') }}"></script>
    <script src="{{ URL::asset('js/awselect.js') }}"></script>
    <!-- File Uploader -->
    <script src="{{ URL::asset('js/file-upload.js') }}"></script>
    <!-- RichText JS -->
    <script src="{{ URL::asset('plugins/richtext/jquery.richtext.min.js') }}"></script>


    <script type="text/javascript">
        $(function() {

            "use strict";

            $('#richtext').richText({

                // text formatting
                bold: true,
                italic: true,
                underline: true,

                // text alignment
                leftAlign: true,
                centerAlign: true,
                rightAlign: true,
                justify: true,

                // lists
                ol: true,
                ul: true,

                // title
                heading: true,

                // fonts
                fonts: true,
                fontList: [
                    "Arial",
                    "Arial Black",
                    "Comic Sans MS",
                    "Courier New",
                    "Geneva",
                    "Georgia",
                    "Helvetica",
                    "Impact",
                    "Lucida Console",
                    "Tahoma",
                    "Times New Roman",
                    "Verdana"
                ],
                fontColor: true,
                fontSize: true,

                // uploads
                imageUpload: true,
                fileUpload: true,

                // media
                videoEmbed: true,

                // link
                urls: true,

                // tables
                table: true,

                // code
                removeStyles: true,
                code: true,

                // colors
                colors: [],

                // dropdowns
                fileHTML: '',
                imageHTML: '',

                // translations
                translations: {
                    'title': 'Title',
                    'white': 'White',
                    'black': 'Black',
                    'brown': 'Brown',
                    'beige': 'Beige',
                    'darkBlue': 'Dark Blue',
                    'blue': 'Blue',
                    'lightBlue': 'Light Blue',
                    'darkRed': 'Dark Red',
                    'red': 'Red',
                    'darkGreen': 'Dark Green',
                    'green': 'Green',
                    'purple': 'Purple',
                    'darkTurquois': 'Dark Turquois',
                    'turquois': 'Turquois',
                    'darkOrange': 'Dark Orange',
                    'orange': 'Orange',
                    'yellow': 'Yellow',
                    'imageURL': 'Image URL',
                    'fileURL': 'File URL',
                    'linkText': 'Link text',
                    'url': 'URL',
                    'size': 'Size',
                    'responsive': 'Responsive',
                    'text': 'Text',
                    'openIn': 'Open in',
                    'sameTab': 'Same tab',
                    'newTab': 'New tab',
                    'align': 'Align',
                    'left': 'Left',
                    'center': 'Center',
                    'right': 'Right',
                    'rows': 'Rows',
                    'columns': 'Columns',
                    'add': 'Add',
                    'pleaseEnterURL': 'Please enter an URL',
                    'videoURLnotSupported': 'Video URL not supported',
                    'pleaseSelectImage': 'Please select an image',
                    'pleaseSelectFile': 'Please select a file',
                    'bold': 'Bold',
                    'italic': 'Italic',
                    'underline': 'Underline',
                    'alignLeft': 'Align left',
                    'alignCenter': 'Align centered',
                    'alignRight': 'Align right',
                    'addOrderedList': 'Add ordered list',
                    'addUnorderedList': 'Add unordered list',
                    'addHeading': 'Add Heading/title',
                    'addFont': 'Add font',
                    'addFontColor': 'Add font color',
                    'addFontSize': 'Add font size',
                    'addImage': 'Add image',
                    'addVideo': 'Add video',
                    'addFile': 'Add file',
                    'addURL': 'Add URL',
                    'addTable': 'Add table',
                    'removeStyles': 'Remove styles',
                    'code': 'Show HTML code',
                    'undo': 'Undo',
                    'redo': 'Redo',
                    'close': 'Close'
                },

                // privacy
                youtubeCookies: false,

                // developer settings
                useSingleQuotes: false,
                height: 0,
                heightPercentage: 0,
                id: "",
                class: "",
                useParagraph: false,
                maxlength: 0,
                callback: undefined,
                useTabForNext: false
            });

            $('#richtext_2').richText({

                // text formatting
                bold: true,
                italic: true,
                underline: true,

                // text alignment
                leftAlign: true,
                centerAlign: true,
                rightAlign: true,
                justify: true,

                // lists
                ol: true,
                ul: true,

                // title
                heading: true,

                // fonts
                fonts: true,
                fontList: [
                    "Arial",
                    "Arial Black",
                    "Comic Sans MS",
                    "Courier New",
                    "Geneva",
                    "Georgia",
                    "Helvetica",
                    "Impact",
                    "Lucida Console",
                    "Tahoma",
                    "Times New Roman",
                    "Verdana"
                ],
                fontColor: true,
                fontSize: true,

                // uploads
                imageUpload: true,
                fileUpload: true,

                // media
                videoEmbed: true,

                // link
                urls: true,

                // tables
                table: true,

                // code
                removeStyles: true,
                code: true,

                // colors
                colors: [],

                // dropdowns
                fileHTML: '',
                imageHTML: '',

                // translations
                translations: {
                    'title': 'Title',
                    'white': 'White',
                    'black': 'Black',
                    'brown': 'Brown',
                    'beige': 'Beige',
                    'darkBlue': 'Dark Blue',
                    'blue': 'Blue',
                    'lightBlue': 'Light Blue',
                    'darkRed': 'Dark Red',
                    'red': 'Red',
                    'darkGreen': 'Dark Green',
                    'green': 'Green',
                    'purple': 'Purple',
                    'darkTurquois': 'Dark Turquois',
                    'turquois': 'Turquois',
                    'darkOrange': 'Dark Orange',
                    'orange': 'Orange',
                    'yellow': 'Yellow',
                    'imageURL': 'Image URL',
                    'fileURL': 'File URL',
                    'linkText': 'Link text',
                    'url': 'URL',
                    'size': 'Size',
                    'responsive': 'Responsive',
                    'text': 'Text',
                    'openIn': 'Open in',
                    'sameTab': 'Same tab',
                    'newTab': 'New tab',
                    'align': 'Align',
                    'left': 'Left',
                    'center': 'Center',
                    'right': 'Right',
                    'rows': 'Rows',
                    'columns': 'Columns',
                    'add': 'Add',
                    'pleaseEnterURL': 'Please enter an URL',
                    'videoURLnotSupported': 'Video URL not supported',
                    'pleaseSelectImage': 'Please select an image',
                    'pleaseSelectFile': 'Please select a file',
                    'bold': 'Bold',
                    'italic': 'Italic',
                    'underline': 'Underline',
                    'alignLeft': 'Align left',
                    'alignCenter': 'Align centered',
                    'alignRight': 'Align right',
                    'addOrderedList': 'Add ordered list',
                    'addUnorderedList': 'Add unordered list',
                    'addHeading': 'Add Heading/title',
                    'addFont': 'Add font',
                    'addFontColor': 'Add font color',
                    'addFontSize': 'Add font size',
                    'addImage': 'Add image',
                    'addVideo': 'Add video',
                    'addFile': 'Add file',
                    'addURL': 'Add URL',
                    'addTable': 'Add table',
                    'removeStyles': 'Remove styles',
                    'code': 'Show HTML code',
                    'undo': 'Undo',
                    'redo': 'Redo',
                    'close': 'Close'
                },

                // privacy
                youtubeCookies: false,

                // developer settings
                useSingleQuotes: false,
                height: 0,
                heightPercentage: 0,
                id: "",
                class: "",
                useParagraph: false,
                maxlength: 0,
                callback: undefined,
                useTabForNext: false
            });



            // DELETE NOTE CONFIRMATION MODAL
            $(document).on('click', '#deleteNoteButton', function(event) {
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

            // open writing note div 
            $(document).on('click', '#createNoteButton', function(event) {
                event.preventDefault();
                // let folder_id = $(this).attr('data-attr');
                // console.log($(this).attr('data-attr'))

                var values1 = $(this).attr('data-attr');
                var para_array1 = values1.split("-");

                var folder_id = para_array1[0];
                        
                if(folder_id == 0){
                    $('#warningModal').modal("show");

                    $('#folder_id_from_modal').change(function() {
                        
                        var values = $(this).val();
                        var para_array = values.split("-");

                        // console.log(para_array)

                        folder_id = para_array[0];
                        var subfoldername = para_array[1];
                        var foldername = para_array[2];

                        $('#warningModal').modal("hide");
                        $('#getfolderid').val(folder_id);
                        $('#note-div').hide();
                        $('#create-note-div').show();
                        $('#note-folder-name').html(foldername);
                        $('#note-subfolder-name').html(subfoldername);
                        
                    })
                }
                else {
                    
                    folder_id = para_array1[0];
                        var subfoldername = para_array1[1];
                        var foldername = para_array1[2];

                    $('#getfolderid').val(folder_id);
                    $('#note-div').hide();
                    $('#create-note-div').show();

                    $('#note-folder-name').html(foldername);
                    $('#note-subfolder-name').html(subfoldername);
                }
               
            });


            // timer to set note title input
            var delay = (function() {
                var timer = 0;
                return function(callback, ms) {
                    clearTimeout(timer);
                    timer = setTimeout(callback, ms);
                };
            })();

            // changing title of the note 
            $(document).on('click', '#edit-note-title', function(event) {
                event.preventDefault();
                console.log('hi');
                var input = '<input type="text" class="form-control" id="title">'
                $('#note-title').html(input);

                $('#title').keyup(function() {
                    delay(function() {
                        var title = $('#title').val();
                        $('#new-note-title').val(title);
                        $('#title').remove();
                        $('#note-title').html(title);
                        // $('#note-breadcrumn-title').html(title);
                    }, 2000);
                });
            });


            // showing note box 
            function shownote(note_id) {
                $('#create-note-div').hide();
                $.ajax({
                    type: 'GET',
                    url: '{{ url('notes/show') }}',
                    data: {
                        note_id: note_id
                    },
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        $("#view-note-div").html(data);
                    }
                });

            }

            shownote(0);

            // selecting note to show
            $(document).on('click', '#sidebar-note-card', function(event) {
                event.preventDefault();
                let note_id = $(this).attr('data-attr');
                shownote(note_id);
            });

             


        });
    </script>
@endsection
