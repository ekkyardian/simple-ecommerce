<?php $this->load->view('layouts/_alert') ?>
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                List Category
                <a href="<?= base_url('category/create') ?>"><button class="btn btn-sm btn-secondary" type="submit">Add new category</button></a>
                <div class="float-right">
                    <form action="" method="post">
                        <div class="input-group">
                            <input id="search" class="form-control" type="text" name="search" placeholder="Search by Title">
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
                                    <a href="#">
                                        <button class="btn btn-sm" type="submit">
                                            <i class="fas fa-edit text-info"></i>
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-sm" type="submit" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                    </a>
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
