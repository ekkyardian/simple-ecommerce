<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">Menu</div>
            <div class="list-group list-group-flush">
                <li class="list-group-item"><a href="index.php?p=profile">Profile</a></li>
                <li class="list-group-item"><a href="#">Orders</a></li>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                Confirmation Payment <span class="badge badge-pill badge-warning float-right">Waiting for Payment</span>
            </div>
            <form action="" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="order_id">Order ID</label>
                        <input id="order_id" class="form-control" type="text" name="order_id" value="#823793847" disabled>
                    </div>
                     <div class="form-group">
                        <label for="req_name">Bank Account Name</label>
                        <input id="req_name" class="form-control" type="text" name="req_name">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input id="amount" class="form-control" type="number" name="amount">
                    </div>
                    <div class="form-group">
                        <label for="note">Note</label>
                        <textarea id="note" class="form-control" name="note" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pict_receipt">Upload Payment Receipt</label>
                        <input id="pict_receipt" class="form-control" type="file" name="pict_receipt">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Confirmation</button>
                </div>
            </form>
        </div>
    </div>
</div>
