<form action="{{ route('subfolder.update', $folder->id) }}" method="POST" enctype="multipart/form-data">
  @method('PUT')
    @csrf
        
    <div class="modal-body">        
		<p>{{ __('Do you want to edit this Sub folder') }}: <strong>{{ $folder->name }}</strong>?</p>     
    </div>
  

    <input type="hidden" name="main_folder_id" value="{{ $folder->main_folder_id }}">

    <div class="input-box"> 
      <input type="text" placeholder="Name" class="form-control @error('folder_name') is-invalid @enderror" name="folder_name" autocomplete="off" value="{{ $folder->name }}" >
      @error('folder_name')
          <span class="invalid-feedback" role="alert">
              {{ $message }}
          </span>
      @enderror
    </div>


    <div class="modal-footer">
      <button type="button" class="btn btn-cancel mr-2" data-dismiss="modal">{{ __('Cancel') }}</button>
      <button type="submit" class="btn btn-confirm">{{ __('Update') }}</button>
  </div>


</form>