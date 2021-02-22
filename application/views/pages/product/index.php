<?php $this->load->view('layouts/_alert') ?>
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                List Product
                <a href="<?= base_url('product/create') ?>"><button class="btn btn-sm btn-secondary" type="submit">Add New Product</button></a>
                <div class="float-right">
                    <form action="" method="post">
                        <div class="input-group">
                            <input id="search" class="form-control" type="text" name="search"
                                placeholder="Search Product by Name">
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
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; foreach($content as $row) : $no++ ?>
                            <tr>
                            <td><?= $no ?></td>
                                <td>
                                <img src="<?= $row->image ? base_url("assets/images/products/$row->image") :
                                base_url('assets/images/products/default-product-umage.jpg') ?>"
                                    alt="Product Image" height="50"> <?= $row->product_title ?>
                                </td>
                                <td><span class="badge badge-primary"><i class="fas fa-tags"></i> <?= $row->category_title ?></span></td>
                                <td>Rp<?= number_format($row->price, 0, ',', '.') ?>, -</td>
                                <td><?= $row->is_available ? "Available" : "Not Available" ?></td>
                                <td>
                                    <?= form_open(base_url("product/delete/$row->id"), ['method' => 'POST']) ?>
                                    <?= form_hidden('id', $row->id) ?>
                                    <a href="<?= base_url("product/edit/$row->id") ?>">
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
