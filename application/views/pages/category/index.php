<?php $this->load->view('layouts/_alert') ?>
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                List Category
                <a href="<?= base_url('category/create') ?>">
                    <button class="btn btn-sm btn-secondary" type="submit">Add new category</button>
                </a>
                <div class="float-right">
                    <?= form_open(base_url('category/search'), ['method' => 'POST']) ?>
                        <div class="input-group">
                            <?= form_input('keyword', $this->session->userdata('keyword'), ['class' => 'form-control',
                                'placeholder' => 'Search by Category Name..']) ?>
                            <div class="input-group-append">
                                <button class="btn btn-info btn-sm" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button type="button" class="btn btn-info btn-sm">
                                    <a href="<?= base_url('category/reset') ?>">
                                        <i class="fas fa-eraser text-white"></i>
                                    </a>
                                </button>
                            </div>
                        </div>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($content as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->title ?></td>
                                <td><?= $row->slug ?></td>
                                <td>
                                    <?= form_open("category/delete/$row->id", ['method' => 'POST']) ?>
                                    <?= form_hidden('id', $row->id) ?>
                                    <a href="<?= base_url('category/edit/' . $row->id) ?>">
                                        <button class="btn btn-sm" type="button">
                                            <i class="fas fa-edit text-info"></i>
                                        </button>
                                    </a>
                                    <a href="<?= base_url('category/delete/' . $row->id) ?>">
                                        <button class="btn btn-sm" type="submit" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                    </a>
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
