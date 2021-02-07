<?php $this->load->view('layouts/_alert'); ?>
<div class="row">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                Register Form
            </div>
            <div class="card-body">
                <?= form_open('register', ['method' => 'POST']) ?>
                    <div class="form-group">
                        <label for="name">Full Name</label>
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
                            'required' => true, 'placeholder' => 'Min 8 char']); ?>
                        <?= form_error('password'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <?= form_password('password_confirmation', '', ['id' => 'password_confirmation',
                            'class' => 'form-control', 'required' => true, 'placeholder' => 'Retype password']); ?>
                        <?= form_error('password_confirmation'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
