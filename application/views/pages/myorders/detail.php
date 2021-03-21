<?php $this->load->view('layouts/_alert') ?>

<div class="row">

    <?php $this->load->view('layouts/_menu') ?>

    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                Order #<?= $orders->invoice ?>
                <div class="float-right">
                    <?php $this->load->view('layouts/_status', ['status' => $orders->status]) ?>
                </div>
            </div>
            <div class="card-body">
                <table>
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
                        <?php $no=0; foreach($orders_detail as $row) : $no++ ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td>
                                <img src="<?= $row->image ? 
                                    base_url("assets/images/products/$row->image") :
                                    base_url('assets/images/products/default-image-product.svg') ?>"
                                    width="50px" alt="Product picture"> 
                                <strong><a href="#"><?= $row->title ?></a></strong>
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
            <?php if ($orders->status == 'waiting') : ?>
            <div class="card-footer">
                <a href="<?= base_url("myorders/paymentConfirmation/$orders->invoice") ?>">
                    <button class="btn btn-success" type="submit">Confirmation Payment</button>
                </a>
            </div>
            <?php endif ?>
        </div>

        <?php if (isset($orders_confirm)) : ?>
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bukti Transfer</div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <td width="200px">Bank Account Name</td>
                                <td>:</td>
                                <td><?= $orders_confirm->account_name ?></td>
                            </tr>
                            <tr>
                                <td>Bank Account Number</td>
                                <td>:</td>
                                <td><?= $orders_confirm->account_number ?></td>
                            </tr>
                            <tr>
                                <td>Nominal</td>
                                <td>:</td>
                                <td>Rp<?= number_format($orders_confirm->nominal, 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td>Note</td>
                                <td>:</td>
                                <td><?= $orders_confirm->note ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <img src="<?= base_url("assets/images/transfer_receipt/$orders_confirm->image") ?>"
                height="200px" alt="Bukti transfer">
            </div>
        </div>
        <?php endif ?>

    </div>

</div>
