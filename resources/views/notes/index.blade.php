<h1 class="card-h6 text-left mt-3 fs-25 pl-1">{{ $folder_name }}</h1>

@if (auth()->user()->role != 3)

{{-- <div class="card-body"> --}}

    {{-- <h1 class="card-h6 text-center mt-2">{{ $folder_name }}</h1> --}}

    <div class="card-sub-body text-center">

        <button style="background: #F6F6F6;" class="btn w-100 text-left pb-3 pt-3" id="createNoteButton"  data-attr = {{ $folder_id }} ><i class="fa fa-plus mr-4 font-weight-bold"></i>Add new note</button>

    </div>

    {{-- </div> --}}

@endif

@if (($notes->count()) > 0)
    


<div class="notes-sidebar background-white  pl-0 pr-1 ">

    @foreach ($notes as $note)

        <div class="card sidebar-card mt-2" id="sidebar-note-card"
            data-attr="{{ $note->id }}">

            <div class="card-body">

                <h6 class="mt-3">
                    {{ date('d M', strtotime($note->created_at)) }}</h6>

                {{-- <div class="d-flex justify-content-between align-items-center"> --}}

                <h6 class="font-weight-bold">{{ $note->title }} </h6>

                {{-- <a class="black-hover" data-toggle="modal" id="deleteNoteButton"
                        data-target="#deleteModal" href=""
                        data-attr=" {{ route('notes.delete', $note['id']) }}"><i
                            class="fa fa-trash mr-5"></i></a> --}}

                {{-- </div> --}}


                <p class="mt-3">
                    @php
                        $html = $note->note;
                        $text = strip_tags($html);
                        $short_text = Illuminate\Support\Str::limit($text, 20);
                    @endphp
                    {{-- {!! Illuminate\Support\Str::limit ($note->note, 50) !!} --}}
                    {{ $short_text }}
                </p>

                @if ($note->folder->main_folder_id != 0)

                @php
                $main_folder_id = $note->folder->main_folder_id ; 
                $main_folder_name = App\Models\Folder::where('id' , $main_folder_id)->value('name');
                 @endphp

                <card class="p-2" style="background: #f6f6f6;">{{ $main_folder_name}}</card>

                @endif
                
                <card class="p-2" style="background: #f6f6f6;">{{ $note->folder->name }}</card>


                {{-- <div
                    class="card-sub-body d-flex justify-content-between align-items-baseline mt-2">
                    <p>{{ $note->user->name }}</p>

                </div> --}}

            </div>

        </div>
    @endforeach

</div>

{{-- <div class="notes-sidebar background-white mt-5 p-3 " >

    @foreach ($notes as $note)
        
    <div class="card sidebar-card" id="sidebar-note-card" data-attr="{{ $note->id }}">

        <div class="d-flex justify-content-between align-items-center">

            <div class="card-h6">{{ $note->title }} </div>

            <a class="black-hover" data-toggle="modal" id="deleteNoteButton" data-target="#deleteModal" href="" data-attr=" {{ route("notes.delete", $note["id"] ) }}"><i class="fa fa-trash mr-5"></i></a>

        </div>
        
        <div class="card-body">
        
          {!! $note->note !!}
        
            <div class="card-sub-body d-flex justify-content-between align-items-baseline mt-2">
        
               <p>{{ $note->user->name }}</p>
        
               <p>{{ date("d M. Y", strtotime($note->created_at)) }}</p>
        
            </div>
        
        </div>
        
        </div>

    @endforeach

</div> --}}

@else

<p class='text-center mt-5'>No Notes available</p>

@endif

