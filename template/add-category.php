<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">Add New Category</div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="category-name">Category Name</label>
                        <input id="slug-title" class="form-control" type="text" name="category-name"
                            onkeyup="createSlug()" required autofocus>
                        <small class="text-danger">Required</small>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input id="slug" class="form-control" type="text" name="slug" disabled>
                        <small class="text-danger">Required</small>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <button class="btn btn-secondary" type="submit">Back to List</button>
               </form>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/app.js"></script>

