<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">Add New User</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" type="text" name="name">
                        <small class="text-danger">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input id="email" class="form-control" type="email" name="email">
                        <small class="text-danger">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" class="form-control" type="password" name="password">
                        <small class="text-danger">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" class="form-control" name="role">
                           <option value="1">Admin</option>
                           <option value="2">Member</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input id="status" class="form-check-input" type="radio" name="status" value="1">
                            <label class="form-check-label" for="">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="status" class="form-check-input" type="radio" name="status" value="0">
                            <label class="form-check-label" for="">Non Active</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Photo</label>
                        <input id="photo" class="form-control" type="file" name="photo">
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <button class="btn btn-secondary" type="submit">Back to list</button>
                </form>
            </div>
        </div>
    </div>
</div>
