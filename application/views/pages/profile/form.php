<div class="row">
    <?php $this->load->view('layouts/_menu') ?>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Profile</div>
            <div class="card-body">
                <?= form_open(base_url("profile/edit/$input->id"), ['method' => 'POST']) ?>
                    <?= form_hidden('id', $input->id) ?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <?= form_input('name', $input->name, ['id' => 'name', 'class' => 'form-control',
                            'autofocus' => true, 'required' => true]) ?>
                        <?= form_error('name') ?>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <?= form_input('email', $input->email, ['type' => 'email', 'id' => 'email',
                            'class' => 'form-control', 'required' => true]) ?>
                        <?= form_error('email') ?>
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label><br>
                        <small class="text-muted">
                            Leave empty this field if you don't want to change the password
                        </small>
                        <?= form_password('password', '', ['class' => 'form-control', 'id' => 'password']) ?>
                        <?= form_error('password') ?>
                    </div>
                    <div class="form-group mb-5">
                        <label for="password_confirmation">Confirm New Password</label><br>
                        <small class="text-muted">
                            Leave empty this field if you don't want to change the password
                        </small>
                        <?= form_password('password_confirmation', '', ['class' => 'form-control',
                            'id' => 'password_confirmation']) ?>
                        <?= form_error('password_confirmation') ?>
                    </div>
                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

