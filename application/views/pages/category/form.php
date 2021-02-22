<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
        <div class="card-header"><strong><?= str_replace(' - Simple Ecommerce', '', $title); ?></strong></div>
            <div class="card-body">
                <?= form_open($form_action, ['method' => 'POST']) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                    <div class="form-group">
                        <label for="title">Category Name</label>
                        <?= form_input('title', $input->title, ['id' => 'title', 'class' => 'form-control',
                            'onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('title') ?>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <?= form_input('slug', $input->slug, ['id' => 'slug', 'class' => 'form-control']) ?>
                        <?= form_error('slug') ?>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a href="<?= base_url('category') ?>">
                        <button class="btn btn-secondary" type="button">Back to List</button>
                    </a>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
