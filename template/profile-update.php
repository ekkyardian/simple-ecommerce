<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">Menu</div>
            <div class="list-group list-group-flush">
                <li class="list-group-item"><a href="index.php?p=profile">Profile</a></li>
                <li class="list-group-item"><a href="index.php?p=orders">Orders</a></li>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Profile</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" type="text" name="name">
                        <small class="text-danger">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input id="email" class="form-control" type="text" name="email">
                    </div>
                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <input id="new-password" class="form-control" type="text" name="new-password">
                    </div>
                    <div class="form-group mb-5">
                        <label for="re-new-password">Retype New Password</label>
                        <input id="re-new-password" class="form-control" type="text" name="re-new-password">
                    </div>
                    <hr>
                    <div class="form-group mt-5">
                        <label for="current-password">Current Password</label>
                        <input id="current-password" class="form-control" type="text" name="current-password">
                        <small class="text-danger">Required</small>
                    </div>
                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
