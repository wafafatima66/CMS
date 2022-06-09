@if (auth()->user()->role != 3)

<div class="card-body">

    <h1 class="card-h6 text-center mt-2">{{ $folder_name }}</h1>
    <div class="card-sub-body text-center  mb-5">

        <button class="btn btn-black" id="createNoteButton"  data-attr = {{ $folder_id }} ><i class="fa fa-plus"></i> Create a note</button>

    </div>

    </div>

@endif

@if (($notes->count()) > 0)
    
<div class="notes-sidebar background-white mt-5 p-3 " >

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

</div>

@else

<p class='text-center'>No Notes available</p>

@endif

