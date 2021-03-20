<div class="row">

<?php $this->load->view('layouts/_menu') ?>

<div class="col-md-9">
    <div class="card">
        <div class="card-header">List Orders</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($content as $row) : $no++ ?>
                    <tr>
                        <td><a href="index.php?p=orders-detail"><?= $row->invoice ?></a></td>
                        <td><?= $row->date ?></td>
                        <td>Rp<?= number_format($row->total, 0, ',', '.') ?></td>
                        <td><span class="badge badge-pill badge-warning"><?= $row->status ?></span></td>
                    </tr>
                    <?php endforeach ?>
                 </tbody>
            </table>
        </div>
    </div>
</div>

</div>
