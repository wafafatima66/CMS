<h1 class="card-h6 text-left mt-3 fs-25 pl-1">{{ Illuminate\Support\Str::ucfirst($folder_name) }}</h1>



    <div class="card-sub-body text-center d-flex w-100" style="margin-top: 35px">

        {{-- <div id="search-bar">
            <div style="background: #F6F6F6;" class="btn w-100 text-left pb-3 pt-3">
                <a class="nav-link icon">
                    <form id="search-field">
                        <input type="search" name='keyword' placeholder="Search Notes" id="searchNotes">
                    </form>
                </a>
            </div>
        </div> --}}
        
        {{-- <span onclick="document.getElementById('myInput').value = ''" title="Clear">X</span> --}}
        
        {{-- <input type="search" name='keyword' placeholder="Search Notes" id="searchNotes" style="background: #F6F6F6;" class="btn w-100 text-left pb-2 pt-2 mr-2"></input> --}}

        <div style="display:inline-flex" class="w-100">

            @if (!empty($search_word))

            <input type="search" name='keyword' placeholder="Search Notes" id="searchNotes" 
            style="background: #F6F6F6; width:80% ; margin-right:0 ; "
            class="btn text-left pb-2 pt-2 border-right-radius-0 "
                value="{{ $search_word }}"/>

            <span class="clear" id="noteClear" style="display: block">X</span>

            @else

            <input type="search" name='keyword' placeholder="Search Notes" id="searchNotes" 
            style="background: #F6F6F6; width:100% ; margin-right:10px ;  "
            class="btn text-left pb-2 pt-2 border-right-radius-0 " />

            <span class="clear" id="noteClear">X</span>

            @endif


        </div>

        @if (auth()->user()->role != 3)
        
        <button  class="btn btn-black" id="createNoteButton"
        data-attr="{{ $folder_id }}-{{ $folder_name }}-{{ $main_folder_name }}"><i class="fa fa-plus font-weight-bold"></i></button>

        @endif
        {{-- <button style="background: #F6F6F6;" class="btn w-100 text-left pb-3 pt-3" id="createNoteButton"
            data-attr={{ $folder_id }}><i class="fa fa-plus mr-4 font-weight-bold"></i>Add new note</button> --}}

    </div>



@if ($notes->count() > 0)

    <div class="notes-sidebar background-white  pl-0 pr-1 ">

        @foreach ($notes as $note)
            <div class="card sidebar-card mt-2" id="sidebar-note-card" data-attr="{{ $note->id }}">

                <div class="card-body">

                    <h6 class="mt-3">
                        {{ date('d M', strtotime($note->created_at)) }}</h6>

                    <h6 class="font-weight-bold">{{ $note->title }} </h6>


                    <p class="mt-3">
                        @php
                            $html = $note->note;
                            $text = strip_tags($html);
                            $short_text = Illuminate\Support\Str::limit($text, 20);
                        @endphp
                        {{-- {!! Illuminate\Support\Str::limit ($note->note, 50) !!} --}}
                        {{ $short_text }}
                    </p>

                    {{-- @php
                        echo $note->folder;

                    @endphp --}}
                    @if ($note->folder->main_folder_id != 0 || is_null($note->folder->main_folder_id) || !empty($note->folder->main_folder_id))
                        @php
                            $main_folder_id = $note->folder->main_folder_id;
                            $main_folder_name = App\Models\Folder::where('id', $main_folder_id)->value('name');
                        @endphp

                        <card class="p-2" style="background: #f6f6f6;">{{ $main_folder_name }}</card>
                    @endif

                    <card class="p-2" style="background: #f6f6f6;">{{ $note->folder->name }}</card>


                </div>

            </div>
        @endforeach

    </div>

@else
    <p class='text-center mt-5'>No Notes available</p>

@endif
