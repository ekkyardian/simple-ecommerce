<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                List User
                <a href="#"><button class="btn btn-sm btn-secondary" type="submit">Add new user</button></a>
                <div class="float-right">
                    <form action="" method="post">
                        <div class="input-group">
                            <input id="search" class="form-control" type="text" name="search" placeholder="Search by Name">
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
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <img src="#" alt="User Photo"> Admin
                                </td>
                                <td>ekkyardian@outlook.com</td>
                                <td>Admin</td>
                                <td>Aktif</td>
                                <td>
                                    <a href="#">
                                        <button class="btn btn-sm" type="submit">
                                        <i class="fas fa-edit text-info"></i>
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-sm" type="submit"
                                            onclick="return confirm('Are you sure?')">
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
