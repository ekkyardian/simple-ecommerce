<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <?= $title ?>
            </div>
            <div class="card-body">
                <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <?= form_input('name', $input->name, ['id' => 'name', 'class' => 'form-control',
                            'required' => true, 'placeholder' => 'Your full name', 'autofocus' => true]); ?>
                        <?= form_error('name'); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email,
                            'class' => 'form-control', 'id' => 'email', 'placeholder' => 'Input valid emai',
                            'required' => true]); ?>
                        <?= form_error('email'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <?= form_password('password', '', ['id' => 'password', 'class' => 'form-control',
                            'placeholder' => 'Min 8 char']); ?>
                        <?= form_error('password'); ?>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'role', 'value' => 'admin',
                                'checked' => $input->role == 'admin' ? true : false,
                                'class' => 'form-check-input']) ?>
                            <label class="form-check-label" for="">Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'role', 'value' => 'member',
                                'checked' => $input->role == 'member' ? true : false,
                                'class' => 'form-check->input']) ?> 
                            <label class="form-check-label" for="">Member</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="is_active">Status</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_active', 'value' => '1',
                                'checked' => $input->is_active == 1 ? true : false,
                                'class' => 'form-check-input']) ?>
                            <label class="form-check-label" for="">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_active', 'value' => '0',
                                'checked' => $input->is_active == 0 ? true : false,
                                'class' => 'form-check->input']) ?> 
                            <label class="form-check-label" for="">Non Active</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image">User Image</label>
                        <?= form_upload('image') ?>
                        <?php if ($this->session->flashdata('image_error')) : ?>
                        <small class="form-text text-danger">
                            <?= $this->session->flashdata('image_error') ?>
                        </small>
                        <?php endif ?>
                        <?php if (isset($input->image)) : ?>
                            <img src="<?= base_url("./assets/images/products/$input->image") ?>"
                            alt="Product Image" height="100">
                        <?php endif ?>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a href="<?= base_url('product') ?>">
                        <button class="btn btn-secondary" type="button">Back to list</button>
                    </a>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

