<?php $this->load->view('layouts/_alert') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=0; foreach($content as $row) : $no++ ?>
                        <tr>
                            <td>
                                <p>
                                    <img src="<?= $row->image ?  base_url("assets/images/products/$row->image") :
                                        base_url('assets/images/products/default-image-product.svg') ?>"
                                        width="50" alt="product picture"> 
                                    <strong><?= $row->title ?></strong>
                                </p>
                            </td>
                            <td>Rp<?= number_format($row->price, 0, ',', '.') ?></td>
                            <td>
                                <?= form_open(base_url("cart/updateQty/$row->id"), ['method' => 'POST']) ?>
                                    <div class="input-group">
                                        <?= form_hidden('id', $row->id) ?>
                                        <?= form_input(['type' => 'number', 'class' => 'form-control',
                                            'name' => 'qty', 'value' => $row->qty]) ?>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </div>
                                    </div>
                                <?= form_close() ?>
                            </td>
                            <td>Rp<?= number_format($row->subtotal, 0, ',', '.') ?></td>
                            <td>
                                <?= form_open(base_url("cart/deleteFromCart/$row->id"), ['method' => 'POST']) ?>
                                    <?= form_hidden('id', $row->id) ?>
                                    <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Delete <?= $row->title ?> from cart?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                <?= form_close() ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                        <tr>
                            <td colspan="3"><strong>Total:</strong></td>
                            <td colspan="2">
                                <strong>
                                    Rp<?= number_format(array_sum(array_column($content, 'subtotal')), 0, ',', '.') ?>
                                </strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary float-right" href="index.php?p=checkout">
                    Check Out <i class="fas fa-angle-right"></i>
                </a>
                <a class="btn btn-warning float-left" href="<?= base_url() ?>">
                    <i class="fas fa-angle-left"></i> Back to Shop
                </a>
            </div>
        </div>
    </div>
</div>
