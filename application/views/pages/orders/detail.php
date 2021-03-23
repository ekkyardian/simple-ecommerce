<?php $this->load->view('layouts/_alert') ?>

<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url('orders') ?>" class="btn btn-secondary">
                            <i class="fas fa-angle-left"></i> Back
                        </a>
                        Invoice #<?= $orders->invoice ?>
                        <div class="float-right">
                            <?php $this->load->view('layouts/_status', ['status' => $orders->status]) ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <th width="130px">Date</th>
                                <td width="20px">:</td>
                                <td><?= str_replace('-', '/', date('F, d - Y', strtotime($orders->date))) ?></td>
                            </tr>
                            <tr>
                                <th width="130px">Name</th>
                                <td width="20px">:</td>
                                <td><?= $orders->name ?></td>
                            </tr>
                            <tr>
                                <th>Telephone</th>
                                <td>:</td>
                                <td><?= $orders->phone ?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>:</td>
                                <td><?= $orders->address ?></td>
                            </tr>
                        </table>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($orders_detail as $row) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <img src="<?= $row->image ? base_url("assets/images/products/$row->image") :
                                            base_url('assets/images/products/default-image-product.svg') ?>" 
                                            height="50px" alt="Product picture"> 
                                        <strong><?= $row->title ?></strong>
                                    </td>
                                    <td>Rp<?= number_format($row->price, 0, ',', '.') ?></td>
                                    <td><?= $row->qty ?></td>
                                    <td>Rp<?= number_format($row->subtotal, 0, ',', '.') ?></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"><span><strong>Total: </strong></span></td>
                                    <td>
                                        <strong>Rp<?= number_format(array_sum(array_column($orders_detail, 'subtotal')),
                                            0, ',', '.') ?></strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-footer">
                        <?= form_open(base_url("orders/updateStatus/$orders->id"), ['method' => 'POST']) ?>
                            <?= form_hidden('id_orders', $orders->id) ?>
                            <div class="input-group">
                                <select id="status" class="form-control" name="status">
                                    <option value="waiting" <?= $orders->status == 'waiting' ? 'selected' : '' ?>>
                                        Waiting for Payment</option>
                                    <option value="paid" <?= $orders->status == 'paid' ? 'selected' : '' ?>>
                                        Paid</option>
                                    <option value="packing" <?= $orders->status == 'packing' ? 'selected' : '' ?>>
                                        On Packing Process</option>
                                    <option value="on-the-way" <?= $orders->status == 'on-the-way' ? 'selected' : '' ?>>
                                        On the Way</option>
                                    <option value="delivered" <?= $orders->status == 'delivered' ? 'selected' : '' ?>>
                                        Delivered</option>
                                    <option value="success" <?= $orders->status == 'success' ? 'selected' : '' ?>>
                                        Success - Done</option>
                                    <option value="cancel" <?= $orders->status == 'cancel' ? 'selected' : '' ?>>
                                        Cancel</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Update Status</button>
                                </div>
                            </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bukti Transfer</div>
                     <div class="card-body">
                        <table>
                            <tr>
                                <th width="150px">Account Name</th>
                                <td width="20px">:</td>
                                <td>
                                    <?= isset($orders_confirm->account_name) ? $orders_confirm->account_name
                                        : '(null)' ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Account Number</th>
                                <td>:</td>
                                <td>
                                    <?= isset($orders_confirm->account_number) ? $orders_confirm->account_number
                                        : '(null)' ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Nominal</th>
                                <td>:</td>
                                <td>
                                    <?= isset($orders_confirm->nominal) ? $orders_confirm->nominal : '(null)' ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Note</th>
                                <td>:</td>
                                <td>
                                    <?= isset($orders_confirm->note) ? $orders_confirm->note : '(null)' ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
           </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="<?= isset($orders_confirm->image) ?
                        base_url("assets/images/transfer_receipt/$orders_confirm->image") :
                        base_url('assets/images/products/default-image-product.svg') ?>"
                            width="250px" alt="Photo Kwitansi">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
