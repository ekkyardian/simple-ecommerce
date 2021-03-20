<?php $this->load->view('layouts/_alert') ?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Form Address</div>
            <div class="card-body">
                <?= form_open(base_url('checkout/createInvoice'), ['method' => 'POST']) ?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <?= form_input('name', $input->name, ['class' => 'form-control', 'id' => 'name',
                            'placeholder' => 'Full name', 'required' => true]) ?>
                        <?= form_error('name') ?>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <?= form_textarea(['name' => 'address', 'value' => $input->address, 'class' => 'form-control',
                            'id' => 'address', 'cols' => 30, 'rows' => 5, 'required' => true]) ?>
                        <?= form_error('address') ?>
                    </div>
                     <div class="form-group">
                        <label for="phone">Phone</label>
                        <?= form_input(['type' => 'number', 'name' => 'phone', 'value' => $input->phone,
                            'class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Your valid telp. number',
                            'required' => true]) ?>
                        <?= form_error('telp') ?>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Product on Cart</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($cart as $row) : ?>
                        <tr>
                            <td><?= $row->title ?></td>
                            <td><?= $row->qty ?></td>
                            <td><?= number_format($row->price, 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Subtotal</strong></td>
                            <td><strong><?= number_format($row->subtotal, 0, ',', '.') ?></strong></td>
                        </tr>
                        <?php endforeach ?>
                   </tbody>
                   <tfoot>
                       <tr>
                           <td colspan="2"><strong>Total</strong></td>
                           <td>
                               <strong>
                                   <?= number_format(array_sum(array_column($cart, 'subtotal')), 0, ',', '.') ?>
                               </strong>
                           </td>
                       </tr>
                   </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
