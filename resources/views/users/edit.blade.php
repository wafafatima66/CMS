
<form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
  @method('PUT')
    @csrf
        
    <div class="modal-body">        
		<p>{{ __('Do you want to edit this User') }}: <strong>{{ $user->name }}</strong>?</p>     
    </div>
 
    <input type="text" class="form-control fs-12 " name="name" value="{{ $user->name }}">
    <input type="text" class="form-control fs-12 mt-2" name="email" value="{{ $user->email }}">
    <select name="role" class="form-control fs-12 mt-2 " >

      <option value="1" @if ($user->role == 1) selected @endif>Admin</option>

      <option value="2" @if ($user->role == 2) selected @endif>Editor</option>

      <option value="3" @if ($user->role == 3) selected @endif>Viewer</option>

    </select>

    <div class="modal-footer mt-5">
      <button type="button" class="btn btn-cancel mr-2" data-dismiss="modal">{{ __('Cancel') }}</button>
      <button type="submit" class="btn btn-confirm">{{ __('Update') }}</button>
  </div>


</form>