<div class="modal fade" id="form-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <form action="javascript:void(0);" method="POST" role="form" id="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control" >
                            </div>
                            <div class="form-group col-md-6">
                                <label>Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>User Name</label>
                                <input type="text" id="username" name="username" class="form-control" >
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email Address</label>
                                <input type="email" id="email" name="email" class="form-control" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Password</label>
                                <input type="password" id="password" name="password" class="form-control" autocomplete="on" >
                            </div>
                            <div class="form-group col-md-6">
                                <label>Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" autocomplete="on" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <p id="error-message" class="text-center text-danger"></p>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="save-form" form="form">Save</button>
            </div>
        </div>
    </div>
</div>