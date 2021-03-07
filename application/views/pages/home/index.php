 <?php $this->load->view('layouts/_alert'); ?>
 <div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        Category: <strong><?= isset($category) ? $category : 'All' ?></strong>
                        <span class="float-right">
                            Order by:
                            <a href="<?= base_url('shop/orderby/asc') ?>" class="badge badge-success">Low Price</a>
                            <a href="<?= base_url('shop/orderby/desc') ?>" class="badge badge-danger">High Price</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $keyword = $this->session->userdata('keyword');
        if ($keyword != '') {
        ?>

        <div class='row'>
            <div class='col-md-12'>
                <div class='alert alert-info pb-3'>
                    Hasil pencarian untuk: <strong><?= $keyword ?></strong>
                    <span class="float-right">
                        <a href="<?= base_url('shop/reset') ?>" class="text-white" style="text-decoration: none;">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-trash-alt"></i> Clear
                            </button>
                        </a>
                    </span>
                </div>
            </div>
        </div>

        <?php } ?>

        <div class="row">
            <?php foreach($content as $row) : ?>
            <div class="col-md-6 mb-3">
                <div class="card mb-3">
                    <img src="<?= $row->image ? base_url("assets/images/products/$row->image") :
                        base_url('assets/images/products/default-image-product.svg') ?>" alt="Product image"
                        class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row->product_title ?></h5>
                        <p class="card-text"><strong>Rp<?= number_format($row->price, 0, ',', '.') ?></strong></p>
                        <p class="card-text"><?= $row->description ?></p>
                        <a href="<?= base_url("shop/category/$row->category_slug") ?>" class="badge badge-primary">
                            <i class="fas fa-tags"></i> <?= $row->category_title ?>
                        </a>
                    </div>
                    <div class="card-footer">
                        <?= form_open(base_url('cart/add')) ?>
                            <div class="input-group">
                                <?= form_hidden('id_product', $row->id) ?>
                                <?= form_input(['type' => 'number', 'class' => 'form-control', 'name' => 'qty',
                                    'id' => 'qty', 'value' => '1']) ?>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Add to card</button>
                                </div>
                            </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Page navigation example">
                    <?= $pagination ?>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <?= form_open('shop/search', ['method' => 'POST']) ?>
                            <div class="input-group">
                                <?= form_input('keyword', $this->session->userdata('keyword'), ['id' => 'keyword',
                                    'class' => 'form-control', 'placeholder' => 'Searh product..']) ?>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">Filter by Category</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="<?= base_url() ?>">All</a></li>
                        <?php foreach(getCategories() as $category) : ?>
                        <li class="list-group-item">
                            <a href="<?= base_url("shop/category/$category->slug") ?>">
                                <?= $category->title ?>
                            </a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>   
