<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <?= $title ?>
            </div>
            <div class="card-body">
                <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                    <div class="form-group">
                        <label for="product-name">Product Name</label>
                        <?= form_input('title', $input->title, ['id' => 'title', 'class' => 'form-control',
                            'onkeyup' => 'createSlug()', 'autofocus' => true, 'required' => true]) ?>
                        <?= form_error('title') ?>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <?= form_input('slug', $input->slug, ['id' => 'slug', 'class' => 'form-control',
                            'required' => true]) ?>
                        <?= form_error('slug') ?>
                    </div>
                    <div class="form-group">
                        <label for="id_category">Category</label>
                        <?= form_dropdown('id_category', getDropdownList('category', ['id', 'title']),
                            $input->id_category, ['class' => 'form-control']) ?>
                        <?= form_error('category') ?>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <?= form_input(['type' => 'number', 'value' => $input->price, 'name' => 'price',
                            'id' => 'price', 'class' => 'form-control', 'required' => true]) ?>
                        <?= form_error('price') ?>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <?= form_textarea(['name' => 'description', 'value' => $input->description,
                            'id' => 'description', 'rows' => 3, 'class' => 'form-control',
                            'required' => true]) ?>
                        <?= form_error('description') ?>
                    </div>
                    <div class="form-group">
                        <label for="availability">Availability</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_available', 'value' => 1,
                                'checked' => $input->is_available == 1 ? true : false,
                                'class' => 'form-check-input']) ?>
                            <label class="form-check-label" for="">Available</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_available', 'value' => 0,
                                'checked' => $input->is_available == 0 ? true : false,
                                'class' => 'form-check->input']) ?>
                            <label class="form-check-label" for="">Not Available</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Product Image</label>
                        <?= form_upload('image') ?>
                        <?php if ($this->session->flashdata('image_error')) : ?>
                        <small class="form-text text-danger">
                            <?= $this->session->flashdata('image_error') ?>
                        </small>
                        <?php endif ?>
                        <?php if ($input->image) : ?>
                            <img src="<?= base_url("./assets/images/products/$input->image") ?>"
                            alt="Product Image" height="100">
                        <?php endif ?>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a href="<?= base_url('product') ?>">
                        <button class="btn btn-secondary" type="button">Back to list</button>
                    </a>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

