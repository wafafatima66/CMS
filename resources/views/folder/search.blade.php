<ul class="list-group mr-5 ml-4 fs-12 searchfolderlist" >

    @foreach ($folders as $folder)

    <li class="list-group-item d-flex justify-content-between align-items-center"  id="notes"
    data-attr="{{ $folder->id }}">
      {{ $folder->name }}
      <span class="badge badge-black badge-pill ml-3">{{ $folder->notes_count }}</span>
    </li>

    @endforeach

  </ul>