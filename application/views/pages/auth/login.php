<?php $this->load->view('layouts/_alert'); ?>
<div class="row">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                Login Form
            </div>
            <div class="card-body">
                <?= form_open('login', ['method' => 'POST']) ?>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'id' => 'email', 'value' => $input->email,
                            'class' => 'form-control', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('email') ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <?= form_password('password', $input->password, ['class' => 'form-control', 'id' => 'password',
                            'required' => true]) ?>
                        <?= form_error('password') ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
