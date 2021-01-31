<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Form Address</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" type="text" name="name" placeholder="Your name">
                        <small class="form-text text-danger">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea id="address" class="form-control" name="address" cols="30" rows="5"></textarea>
                        <small class="form-text text-danger">Required</small>
                    </div>
                     <div class="form-group">
                        <label for="telp">Telp</label>
                        <input id="telp" class="form-control" type="text" name="telp" placeholder="Telephone number">
                        <small class="form-text text-danger">Required</small>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
               </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Cart</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Product Title</td>
                            <td>3</td>
                            <td>Rp150.000</td>
                        </tr>
                        <tr>
                            <td colspan="2">Subtotal</td>
                            <td>Rp450.000</td>
                        </tr>
                   </tbody>
                   <tfoot>
                       <tr>
                           <td colspan="2"><strong>Total</strong></td>
                           <td><strong>Rp450.000</strong></td>
                       </tr>
                   </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
