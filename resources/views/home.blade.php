@extends('layouts.app')

@section('css')
    <!-- Data Table CSS -->
    <link href="{{ URL::asset('plugins/awselect/awselect.min.css') }}" rel="stylesheet" />
    <!-- RichText CSS -->
    <link href="{{ URL::asset('plugins/richtext/richtext.min.css') }}" rel="stylesheet" />
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

                                
                                <div class="col-md-3 pr-0 pl-0">
                                    @if ( auth()->user()->role == 2)
                                    <div class="card-body">
                                        <div class="card-sub-body text-center mt-5 mb-5">
                                            <button class="btn btn-black"><i class="fa fa-plus"></i> Create a note</button>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="notes-sidebar background-white mt-5 p-3 ">
                
                                        <?php
                                    for($i=0 ; $i<10 ; $i++){ ?>
                
                                        <div class="card sidebar-card">
                                            <div class="card-h6">Sep 12 2018</div>
                                            <div class="card-body">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis, alias.
                                                <div class="card-sub-body d-flex justify-content-between align-items-baseline mt-2">
                                                    <p>Tomito keyo</p>
                                                    <p>Today 9:59</p>
                
                                                </div>
                                            </div>
                                        </div>
                
                                        <?php }
                                ?>
                
                
                                    </div>
                
                                </div>
                                <div class="col-md-9 border-left">
                                        <div class="card-header border-bottom">App Future , Inc</div>
                                        <div class="card-h6">Sep 12 2018</div>
                                        {{-- <div class=""> --}}
                                            @if ( auth()->user()->role == 2)
                                            <div class="input-box" >
                                                <textarea class="form-control" name="content" rows="12" id="richtext" required>{{ old('content') }}</textarea>
                                                @error('content')
                                                    <p class="text-danger">{{ $errors->first('content') }}</p>
                                                @enderror
                                            </div>
                                            @endif
                                        {{-- </div> --}}
                                </div>
                            </div>

                            
                        </div> <!-- END BOX CONTENT -->
                    </div>
                </div>
            </div>
        </div>
    </div>
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

        });
    </script>
@endsection
