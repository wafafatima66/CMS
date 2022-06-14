<form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
    @csrf

   
    <input type="text" class="form-control fs-12 " name="name" placeholder="User Name">

    <input type="text" class="form-control fs-12 mt-2" name="email" placeholder="Email">

    <input type="text" class="form-control fs-12 mt-2" name="password" placeholder="Password">

    <select name="role" class="form-control fs-12 mt-2 " >

    <option value="" >Select Role</option>

      <option value="1" >Admin</option>

      <option value="2" >Editor</option>

      <option value="3" >Viewer</option>

    </select>

    <div class="modal-footer mt-5">

        <button type="button" class="btn btn-cancel mr-2" data-dismiss="modal">{{ __('Cancel') }}</button>

        <button type="submit" class="btn btn-confirm">{{ __('Create') }}</button>

    </div>

</form>
