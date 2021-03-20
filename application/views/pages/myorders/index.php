<div class="row">

<?php $this->load->view('layouts/_menu') ?>

<div class="col-md-9">
    <div class="card">
        <div class="card-header">List Orders</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=0; foreach($content as $row) : $no++ ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><a href="<?= base_url("myorders/detail/$row->invoice") ?>"><?= $row->invoice ?></a></td>
                        <td><?= str_replace('-', '/', date('d-m-Y', strtotime($row->date))) ?></td>
                        <td>Rp<?= number_format($row->total, 0, ',', '.') ?></td>
                        <td><?php $this->load->view('layouts/_status', ['status' => $row->status]) ?></td>
                    </tr>
                    <?php endforeach ?>
                 </tbody>
            </table>
        </div>
    </div>
</div>

</div>
