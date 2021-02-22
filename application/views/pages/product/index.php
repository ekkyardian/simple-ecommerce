<?php $this->load->view('layouts/_alert') ?>
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                List Product
                <a href="<?= base_url('product/create') ?>"><button class="btn btn-sm btn-secondary" type="submit">Add New Product</button></a>
                <div class="float-right">
                    <?= form_open(base_url('product/search'), ['method' => 'POST']) ?>
                        <div class="input-group">
                            <?= form_input('keyword', $this->session->userdata('keyword'), ['id' => 'keyword',
                                'class' => 'form-control', 'placeholder' => "Search product"]) ?>
                            <div class="input-group-append">
                                <button class="btn btn-secondary btn-sm" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <a href="<?= base_url('product/reset') ?>" class="text-white">
                                    <button class="btn btn-secondary btn-sm" type="button">
                                        <i class="fas fa-eraser"></i>
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
