
<form action="{{ route('subfolder.update', $folder->id) }}" method="POST" enctype="multipart/form-data">
  @method('PUT')
    @csrf
        
    <div class="modal-body">        
		<p>{{ __('Do you want to edit this Sub folder') }}: <strong>{{ $folder->name }}</strong>?</p>     
    </div>
    {{-- <div class="modal-footer">
        <button type="button" class="btn btn-cancel mr-2" data-dismiss="modal">{{ __('Cancel') }}</button>
        <button type="submit" class="btn btn-confirm">{{ __('Confirm') }}</button>
    </div> --}}

    <div class="form-group">

      <select  name="main_folder_id" data-placeholder="Select Folder" required class="form-control" 
      
      style="font-size: 12px;
      font-family: 'Poppins', sans-serif;
      border-radius: 0px;
      font-weight: 600;">	

        @foreach ($main_folders as $main_folder)
          <option {{ ($folder->main_folder_id == $main_folder->id) ? 'selected' : '' }}  value="{{ $main_folder->id }}">{{ $main_folder->name }}</option>
        @endforeach			
        			
      </select>

      @error('main_folder_id')
        <p class="text-danger">{{ $errors->first('main_folder_id') }}</p>
      @enderror

    </div>


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