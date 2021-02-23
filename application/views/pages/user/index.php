<?php $this->load->view('layouts/_alert') ?>
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                List User
                <a href="<?= base_url('user/create') ?>">
                    <button class="btn btn-sm btn-secondary" type="button">Add new user</button>
                </a>
                <div class="float-right">
                    <form action="" method="post">
                        <div class="input-group">
                            <input id="search" class="form-control" type="text" name="search" placeholder="Search by Name">
                            <div class="input-group-append">
                                <button class="btn btn-secondary btn-sm" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-secondary btn-sm" type="submit">
                                    <i class="fas fa-eraser"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=0; foreach($content as $row) : $no++; ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td>
                                    <img src="<?= $row->image ? base_url("assets/images/avatar/$row->image") :
                                        base_url('assets/images/avatar/default-avatar.svg') ?>" alt="User Avatar"
                                        width="50"> <?= $row->name ?>
                                </td>
                                <td><?= $row->email ?></td>
                                <td><?= $row->role ?></td>
                                <td><?= $row->is_active ? "Active" : "Non Active" ?></td>
                                <td>
                                    <?= form_open(base_url("user/delete/$row->id"), ['method' => 'post']) ?>
                                    <?= form_hidden('id', $row->id) ?>
                                    <a href="<?= base_url("user/edit/$row->id") ?>">
                                        <button class="btn btn-sm" type="button">
                                        <i class="fas fa-edit text-info"></i>
                                        </button>
                                    </a>
                                    <button class="btn btn-sm" type="submit"
                                        onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                    <?= form_close() ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <?= $pagination ?>
                    </nav>
                </form>
           </div>
        </div>
    </div>
</div>
