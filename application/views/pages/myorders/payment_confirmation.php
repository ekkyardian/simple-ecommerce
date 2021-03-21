<div class="row">
    <?php $this->load->view('layouts/_menu') ?>

    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                Payment Confirmation
                <div class="float-right">
                    <?php $this->load->view('layouts/_status', ['status' => $orders->status]) ?>
                </div>
            </div>
            <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="order_id">Order ID</label>
                        <?= form_hidden('id_orders', $orders->id) ?>
                        <?= form_input('', '#' . $orders->invoice, ['class' => 'form-control', 'disabled' => true]) ?>
                    </div>
                     <div class="form-group">
                        <label for="account_name">Bank Account Name</label>
                        <?= form_input('account_name', $input->account_name, ['class' => 'form-control',
                            'id' => 'account_name', 'required' => true]) ?>
                        <?= form_error('account_name') ?>
                    </div>
                     <div class="form-group">
                        <label for="account_number">Bank Account Number</label>
                        <?= form_input(['type' => 'number', 'name' => 'account_number', 'value' => 
                            $input->account_number, 'class' => 'form-control', 'id' => 'account_number',
                            'required' => true]) ?>
                        <?= form_error('account_number') ?>
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <?= form_input(['type' => 'number', 'name' => 'nominal', 'value' => $input->nominal,
                            'class' => 'form-control', 'id' => 'nominal', 'required' => true]) ?>
                        <?= form_error('nominal') ?>
                    </div>
                    <div class="form-group">
                        <label for="note">Note</label>
                        <?= form_textarea('note', $input->note, ['class' => 'form-control', 'id' => 'note']) ?>
                        <?= form_error('note') ?>
                    </div>
                    <div class="form-group">
                        <label for="pict_receipt">Upload Payment Receipt</label>
                        <?= form_upload('image') ?>
                        <?php if ($this->session->flashdata('image_error')) : ?>
                        <small class="form-text text-danger">
                            <?= $this->session->flashdata('image_error') ?>
                        </small>
                        <?php endif ?>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Confirmation</button>
                </div>
            <?= form_close() ?>
        </div>
    </div>

</div>
