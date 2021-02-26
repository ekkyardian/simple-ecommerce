 <?php $this->load->view('layouts/_alert'); ?>
 <div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        Category: <strong>All</strong>
                        <span class="float-right">
                            Order by:
                            <a href="<?= base_url('shop/orderby/asc') ?>" class="badge badge-success">Low Price</a>
                            <a href="<?= base_url('shop/orderby/desc') ?>" class="badge badge-danger">High Price</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
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
                        <a href="#" class="badge badge-primary"><i class="fas fa-tags">
                            </i> <?= $row->category_title ?>
                        </a>
                    </div>
                    <div class="card-footer">
                        <form action="" method="post">
                            <div class="input-group">
                                <input type="number" name="quantity" id="quantity" class="form-control">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Add to card</button>
                                </div>
                            </div>
                        </form>
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
                        <form action="" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" id="search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Go</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">Filter by Category</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">All</li>
                        <li class="list-group-item">Category 1</li>
                        <li class="list-group-item">Category 2</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>   
