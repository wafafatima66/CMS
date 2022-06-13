<div id="note-div">

    <form action="{{ route('notes.update', $note->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="border-bottom">

            {{-- <h1 class="card-h6 text-left mt-2 fs-15">Notes > {{ Illuminate\Support\Str::ucfirst($note->title ) }} </h1> --}}

            @if ($note->folder->main_folder_id != 0)
                @php
                    $main_folder_id = $note->folder->main_folder_id;
                    $main_folder_name = App\Models\Folder::where('id', $main_folder_id)->value('name');
                @endphp

                <h1 class="card-h6 text-left mt-2 fs-15">{{ $main_folder_name }} >
                    {{ Illuminate\Support\Str::ucfirst($note->folder->name) }} </h1>
            @else
                <h1 class="card-h6 text-left mt-2 fs-15">
                    {{ Illuminate\Support\Str::ucfirst($note->folder->name) }} </h1>
            @endif



        </div>

        <div class="d-flex justify-content-between">

            <div class="card-h6 fs-25">

                {{ Illuminate\Support\Str::ucfirst($note->title) }}

            </div>

            <div>
                <a class="black-hover  p-2 m-2" data-toggle="modal" id="deleteNoteButton" data-target="#deleteModal"
                    href="" data-attr=" {{ route('notes.delete', $note['id']) }}">
                    <i class="fa fa-trash mt-5"></i>
                </a>

                <button type="button" class=" btn black-hover p-2 m-2 " id="commentbutton"
                    data-attr=" {{ $note['id'] }} ">
                    <i class="fas fa-comment-dots"></i>
                </button>

            </div>


        </div>

        {{-- comments --}}

        <div id="commentbox">

            <div class="d-flex justify-content-between p-2">
                <h1 class="card-h6 text-center mt-3 fs-25 pl-1">Comments</h1>
                <span id="close-slider" class="float-right btn "><i class="fas fa-times-circle mt-5"></i></span>
            </div>


            <div class="slider-inner p-1">


                <input type="text" class="form-control fs-12" placeholder="Write Down Your Comments" id="addComments" data-attr=" {{ $note['id'] }}" >
                <p id="alertComments" class="text-danger"></p>

                <div id="comments-inner">

                </div>

            </div>


        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-2">
                    <p>Created By : </p>
                </div>
                <div class="col-4">
                    <p class="font-weight-700">{{ Illuminate\Support\Str::ucfirst($note->user->name) }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <p>Last Modified : </p>
                </div>
                <div class="col-4">
                    <p class="font-weight-700">{{ date('F j, Y, g:i a', strtotime($note->created_at)) }}</p>
                </div>
            </div>

        </div>



        @if (auth()->user()->role == 3)
            <div class="card-body mt-3" style="height: 100%">

                {!! $note->note !!}

            </div>
        @else
            <div class="input-box mt-3">

                <textarea class="form-control" name="content" rows="12" id="richtext_3" required>{{ $note->note }}</textarea>

            </div>

            <div class="border-0 text-right mb-2 mt-1">

                <button type="submit" class="btn btn-black">{{ __('Update') }}</button>

            </div>

    </form>

</div>
@endif

<!-- RichText JS -->
<script src="{{ URL::asset('plugins/richtext/jquery.richtext.min.js') }}"></script>

<script>
    $('#richtext_3').richText({

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

    // load comments function
    function showComments(note_id){
        $.ajax({
            type: 'GET',
            url: '{{ url('comments/show') }}',
            data: {
                note_id: note_id
            },
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            success: function(data) {
                $("#comments-inner").html(data);
            }
        });
    }
    // comments
   
    $('#commentbutton').unbind().click(function() {
       
        let note_id = $(this).attr('data-attr');
        console.log(note_id)
        showComments(note_id)
        $('#commentbox').animate({
            right: "400px"
        }, 1000);
    });

    $('#close-slider').click(function() {
        $('#commentbox').animate({
            right: "-1400px"
        }, 2000);
    });

    // adding comments 

    // $(document).on('keyup', '#addComments', function(event) {
        $('#addComments').unbind().keyup(function() {
        event.preventDefault();

        if (event.keyCode === 13) {
            var comment = $('#addComments').val();
            var note_id = $(this).attr('data-attr');
            console.log(note_id)
            $.ajax({
                type: 'POST',
                url: 'comments',
                data: {
                    comment: comment,
                    note_id: note_id
                },
                headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
                },
                // dataType: 'json',
                success: function(data) {
                    if(data == 'success'){
                        showComments(note_id);
                        $('#addComments').val('');
                        
                    }else{
                        $('#alertComments').html('Comments Not added , Try again !');
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    });
</script>
