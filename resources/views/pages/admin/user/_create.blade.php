<div class="modal fade" id="create-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create New User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div>
        <form action="{{ route('users.store') }}" method="POST" role="form" id="createForm">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label>First name</label>
              <input type="text" name="first_name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Last name</label>
              <input type="text" name="last_name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>User name</label>
              <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Email address</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="createForm">Save changes</button>
      </div>
    </div>
  </div>
</div>