<?php

$success    = $this->session->flashdata('success');
$warning    = $this->session->flashdata('warning');
$error      = $this->session->flashdata('error');

if ($success) {
    $alert_status   = 'alert-success';
    $message_title  = 'Success!';
    $message        = $success;
}

if ($warning) {
    $alert_status   = 'alert-warning';
    $message_title  = 'Warning!';
    $message        = $warning;
}

if ($error) {
    $alert_status   = 'alert-danger';
    $message_title  = 'Error!';
    $message        = $error;
}

?>

<?php if ($success || $warning || $error) : ?>
<div class="row">
    <div class="col-md-12">
    <div class="alert <?= $alert_status; ?> alert-dismissible fade show">
    <strong><?= $message_title; ?></strong> <?= $message; ?>
            <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                <span arial-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
<?php endif ?>
