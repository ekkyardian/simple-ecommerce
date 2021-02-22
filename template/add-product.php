<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">Add New Product</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="product-name">Product Name</label>
                        <input id="slug-title" class="form-control" type="text" name="product-name"
                            onkeyup="createSlug()" required autofocus>
                        <small class="text-danger">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input id="slug" class="form-control" type="text" name="slug" disabled>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input id="price" class="form-control" type="price" name="price" required>
                        <small class="text-danger">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" class="form-control" name="category">
                           <option value="laptop">Laptop</option>
                           <option value="smartphone">Smartphone</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="availability">Availability</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input id="availability" class="form-check-input" type="radio" name="availability" value="1">
                            <label class="form-check-label" for="">Available</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="availability" class="form-check-input" type="radio" name="availability" value="0">
                            <label class="form-check-label" for="">Not Available</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Product Photo</label>
                        <input id="product-photo" class="form-control" type="file" name="product-photo">
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <button class="btn btn-secondary" type="submit">Back to list</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/app.js"></script>
