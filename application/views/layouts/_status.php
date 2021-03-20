<?php

// Check status type
if ($status == 'waiting') {
    $badge_status = 'badge-secondary';
    $status       = 'Waiting';
} elseif ($status == 'paid') {
    $badge_status = 'badge-primary';
    $status       = 'Paid';
} elseif ($status == 'packing') {
    $badge_status = 'badge-warning';
    $status       = 'On Packing Process';
} elseif ($status == 'on-the-way') {
    $badge_status = 'badge-warning';
    $status       = 'On the Way';
} elseif ($status == 'delivered') {
    $badge_status = 'badge-success';
    $status       = 'Delivered';
} elseif ($status == 'success') {
    $badge_status = 'badge-success';
    $status       = 'Success';
} elseif ($status == 'cancel') {
    $badge_status = 'badge-danger';
    $status       = 'Canceled';
} else {
    $badge_status = 'badge-danger';
    $status       = 'error!';
}

// Print status badge
if ($status) {
    echo "<span class='badge badge-pill " . $badge_status . "'>" . 
        $status . "</span>"
    ;
}

