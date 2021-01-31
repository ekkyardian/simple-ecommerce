<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                List Category
                <a href="#"><button class="btn btn-sm btn-secondary" type="submit">Add new category</button></a>
                <div class="float-right">
                    <form action="" method="post">
                        <div class="input-group">
                            <input id="search" class="form-control" type="text" name="search" placeholder="Search by Title">
                            <div class="input-group-append">
                                <button class="btn btn-secondary btn-sm" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-secondary btn-sm" type="submit">
                                    <i class="fas fa-eraser"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Laptop</td>
                                <td>laptop</td>
                                <td>
                                    <a href="#">
                                        <button class="btn btn-sm" type="submit">
                                            <i class="fas fa-edit text-info"></i>
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-sm" type="submit" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Smartphone</td>
                                <td>smartphone</td>
                                <td>
                                    <a href="#">
                                        <button class="btn btn-sm" type="submit">
                                            <i class="fas fa-edit text-info"></i>
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-sm" type="submit" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a href="#" class="page-link">Previous</a></li>
                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">Next</a></li>
                        </ul>
                    </nav>
                </form>
           </div>
        </div>
    </div>
</div>
