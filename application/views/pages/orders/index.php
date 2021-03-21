<?php $this->load->view('layouts/_alert') ?>
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                List Orders
                <div class="float-right">
                    <?= form_open(base_url('orders/search'), ['method' => 'POST']) ?>
                        <div class="input-group">
                            <?= form_input('keyword', $this->session->userdata('keyword'), ['class' => 'form-control',
                                'placeholder' => 'Search by Orders Invoice..']) ?>
                            <div class="input-group-append">
                                <button class="btn btn-info btn-sm" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button type="button" class="btn btn-info btn-sm">
                                    <a href="<?= base_url('orders/reset') ?>">
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
                                <th>Invoice</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($content as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <a href="<?= base_url("orders/detail/$row->invoice") ?>">#<?= $row->invoice ?></a>
                                </td>
                                <td><?= $row->date ?></td>
                                <td>Rp<?= number_format($row->total, 0, ',', '.') ?></td>
                                <td><?php $this->load->view('layouts/_status', ['status' => $row->status]) ?></td>
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
