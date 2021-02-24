<?php $this->load->view('layouts/_alert') ?>
<div class="row">
    <?php $this->load->view('layouts/_menu') ?>
    <div class="col-md-3">
        <div class="card p-3 text-center">
            <img src="<?= $content->image ? base_url("assets/images/avatar/$content->image") :
                base_url('assets/images/avatar/default-avatar.svg') ?>" alt="Profile Picture">
        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-3">
            <table>
                <tr>
                    <td width="100">Name</td>
                    <td width="20">:</td>
                    <td><?= $content->name ?></td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>:</td>
                    <td><?= $content->email ?></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>:</td>
                    <td>
                        <?php
                        if ($content->role == 'member') {
                            echo 'Member';
                        } elseif ($content->role == 'admin') {
                            echo 'Admin';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <?= form_open(base_url("user/edit/$content->id")) ?>
                    <td colspan="3">
                        <a href="<?= base_url("profile/edit/$content->id") ?>">
                            <button class="btn btn-primary" type="button">Edit</button>
                        <?= form_close() ?>
                    </td>
                </tr>
            </table>
        </div>
   </div>
</div>

