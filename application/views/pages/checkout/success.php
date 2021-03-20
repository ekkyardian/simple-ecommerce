<?php $this->load->view('layouts/_alert') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Checkout Success</div>
            <div class="card-body">
                <h5>Nomor Order: #<?= $content->invoice ?></h5>
                <p>Terima kasih, sudah berbelanja</p>
                <p>Silakan melakukan pembayaran agar bisa kami proses dengan cara:</p>
                <ol>
                    <li>Lakukan pembayaran pada rekening <strong>BCA 3209123123</strong> a.n. PT Simple Ecommerce</li>
                    <li>Sertakan keterangan dengan nomor order: <strong><?= $content->invoice ?></strong></li>
                    <li>Total pembayaran: 
                        <strong>Rp<?= number_format($content->total, 0, ',', '.') ?></strong>
                    </li>
                </ol>
                <p>Jika sudah, silakan kirimkan bukti transfer di halaman 
                    <a href="<?= base_url("myorders/detail/$content->invoice") ?>">konfirmasi pembayaran</a>
                </p>
            </div>
            <div class="card-footer">
                <a href="#">
                    <button class="btn btn-warning float-left" type="submit">
                        <i class="fas fa-angle-left"></i> Change address
                    </button>
                </a>
                <a href="<?= base_url('myorders') ?>">
                    <button class="btn btn-primary float-right" type="submit">
                        List shop <i class="fas fa-angle-right"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
