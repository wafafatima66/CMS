<form method="POST" action="{{ route('subfolder.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="modal-body">
        <p>{{ __('Add Sub folder to ') }}: <strong>{{ $folder->name }}</strong>?</p>
    </div>


    <input type="hidden" name="main_folder_id"  value="{{ $folder->id }}">

    <div class="input-box">
        <input type="text" placeholder="Name" class="form-control @error('folder_name') is-invalid @enderror"
            name="folder_name" autocomplete="off">
        @error('folder_name')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @enderror

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-cancel mr-2" data-dismiss="modal">{{ __('Cancel') }}</button>
        <button type="submit" class="btn btn-confirm">{{ __('Create') }}</button>
    </div>


</form>
