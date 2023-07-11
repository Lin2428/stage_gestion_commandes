<div class="row mb-2 mb-xl-3">
<div class="col-auto d-none d-sm-block">
    <h3><strong>Gestion des commandes</strong> Dashboard</h3>
</div>

</div>
<div class="row">
<div class="col-sm-6 col-xl-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col mt-0">
                    <h5 class="card-title">Revenu courant</h5>
                </div>

                <div class="col-auto">
                    <div class="stat text-primary">
                        <i class="align-middle" data-feather="dollar-sign"></i>
                    </div>
                </div>
            </div>
            <h4 class="mt-1 mb-3"><?= number_format($current->getCurrentRevenu(), 0, ',', ' ')  ?> XAF</h4>
            <div class="mb-0">
                <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i> 3.65% </span>
                <span class="text-muted">du revenu total</span>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xl-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col mt-0">
                    <h5 class="card-title">Commandes</h5>
                </div>

                <div class="col-auto">
                    <div class="stat text-primary">
                        <i class="align-middle" data-feather="shopping-bag"></i>
                    </div>
                </div>
            </div>
            <h4 class="mt-1 mb-3"><?= number_format($current->getNbCommandes(), 0, ',', ' ')  ?></h4>
            <div class="mb-0">
                <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
                <span class="text-muted">des commandes</span>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xl-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col mt-0">
                    <h5 class="card-title">Livrées</h5>
                </div>

                <div class="col-auto">
                    <div class="stat text-primary">
                        <i class="align-middle" data-feather="truck"></i>
                    </div>
                </div>
            </div>
            <h4 class="mt-1 mb-3"><?= number_format($livrer->getNbLivrer(), 0, ',', ' ')  ?></h4>
            <div class="mb-0">
                <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i> 100% </span>
                <span class="text-muted">des commandes</span>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6 col-xl-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col mt-0">
                    <h5 class="card-title">Revenue total</h5>
                </div>

                <div class="col-auto">
                    <div class="stat text-primary">
                        <i class="align-middle" data-feather="dollar-sign"></i>
                    </div>
                </div>
            </div>
            <h4 class="mt-1 mb-3"><?= number_format($total->getTotal(), 0, ',', ' ')  ?> XAF</h4>
            <div class="mb-0">
                <span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i> 100% </span>
                <span class="text-muted">du revenu</span>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
<div class="col-12 col-lg-8 d-flex">
    <div class="card flex-fill w-100">
        <div class="card-header">
            <div class="float-end">
                <form class="row g-2">
                    <div class="col-auto">
                        <select class="form-select form-select-sm bg-light border-0">
                            <option>Jan</option>
                            <option value="1">Feb</option>
                            <option value="2">Mar</option>
                            <option value="3">Apr</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control form-control-sm bg-light rounded-2 border-0" style="width: 100px;"
                            placeholder="Search..">
                    </div>
                </form>
            </div>
            <h5 class="card-title mb-0">Total Revenue</h5>
        </div>
        <div class="card-body pt-2 pb-3">
            <div class="chart chart-md">
                <canvas id="chartjs-dashboard-line"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-lg-4 d-flex">
    <div class="card flex-fill w-100">
        <div class="card-header">
            <div class="float-end">
                <form class="row g-2">
                    <div class="col-auto">
                        <select class="form-select form-select-sm bg-light border-0">
                            <option>Jan</option>
                            <option value="1">Feb</option>
                            <option value="2">Mar</option>
                            <option value="3">Apr</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control form-control-sm bg-light rounded-2 border-0" style="width: 100px;"
                            placeholder="Search..">
                    </div>
                </form>
            </div>
            <h5 class="card-title mb-0">Sales by State</h5>
        </div>
        <div class="card-body px-4">
            <div id="usa_map" style="height:294px;"></div>
        </div>
    </div>
</div>
</div>

<div class="row">
<div class="col-12 col-lg-4 col-xxl-3 d-flex">
    <div class="card flex-fill w-100">
        <div class="card-header">
            <div class="card-actions float-end">
                <div class="dropdown position-relative">
                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                        <i class="align-middle" data-feather="more-horizontal"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <h5 class="card-title mb-0">Sales/Revenue</h5>
        </div>
        <div class="card-body d-flex w-100">
            <div class="align-self-center chart chart-lg">
                <canvas id="chartjs-dashboard-bar"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-lg-8 col-xxl-9 d-flex">
    <div class="card flex-fill">
        <div class="card-header">
            <div class="card-actions float-end">
                <div class="dropdown position-relative">
                    <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                        <i class="align-middle" data-feather="more-horizontal"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <h5 class="card-title mb-0">Top Selling Products</h5>
        </div>
        <table class="table table-borderless my-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="d-none d-xxl-table-cell">Company</th>
                    <th class="d-none d-xl-table-cell">Assigned</th>
                    <th class="d-none d-xl-table-cell text-end">Orders</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="bg-light rounded-2">
                                    <img class="p-2" src="img/icons/brand-4.svg">
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <strong>Aurora</strong>
                                <div class="text-muted">
                                    UI Kit
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="d-none d-xxl-table-cell">
                        <strong>Lechters</strong>
                        <div class="text-muted">
                            Real Estate
                        </div>
                    </td>
                    <td class="d-none d-xl-table-cell">
                        <strong>Vanessa Tucker</strong>
                        <div class="text-muted">
                            HTML, JS, React
                        </div>
                    </td>
                    <td class="d-none d-xl-table-cell text-end">
                        520
                    </td>
                    <td>
                        <span class="badge badge-success-light">In progress</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="bg-light rounded-2">
                                    <img class="p-2" src="img/icons/brand-1.svg">
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <strong>Bender</strong>
                                <div class="text-muted">
                                    Dashboard
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="d-none d-xxl-table-cell">
                        <strong>Cellophane Transportation</strong>
                        <div class="text-muted">
                            Transportation
                        </div>
                    </td>
                    <td class="d-none d-xl-table-cell">
                        <strong>William Harris</strong>
                        <div class="text-muted">
                            HTML, JS, Vue
                        </div>
                    </td>
                    <td class="d-none d-xl-table-cell text-end">
                        240
                    </td>
                    <td>
                        <span class="badge badge-warning-light">Paused</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="bg-light rounded-2">
                                    <img class="p-2" src="img/icons/brand-5.svg">
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <strong>Camelot</strong>
                                <div class="text-muted">
                                    Dashboard
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="d-none d-xxl-table-cell">
                        <strong>Clemens</strong>
                        <div class="text-muted">
                            Insurance
                        </div>
                    </td>
                    <td class="d-none d-xl-table-cell">
                        <strong>Darwin</strong>
                        <div class="text-muted">
                            HTML, JS, Laravel
                        </div>
                    </td>
                    <td class="d-none d-xl-table-cell text-end">
                        180
                    </td>
                    <td>
                        <span class="badge badge-success-light">In progress</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="bg-light rounded-2">
                                    <img class="p-2" src="img/icons/brand-2.svg">
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <strong>Edison</strong>
                                <div class="text-muted">
                                    UI Kit
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="d-none d-xxl-table-cell">
                        <strong>Affinity Investment Group</strong>
                        <div class="text-muted">
                            Finance
                        </div>
                    </td>
                    <td class="d-none d-xl-table-cell">
                        <strong>Vanessa Tucker</strong>
                        <div class="text-muted">
                            HTML, JS, React
                        </div>
                    </td>
                    <td class="d-none d-xl-table-cell text-end">
                        410
                    </td>
                    <td>
                        <span class="badge badge-danger-light">Cancelled</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="bg-light rounded-2">
                                    <img class="p-2" src="img/icons/brand-3.svg">
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <strong>Fusion</strong>
                                <div class="text-muted">
                                    Dashboard
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="d-none d-xxl-table-cell">
                        <strong>Konsili</strong>
                        <div class="text-muted">
                            Retail
                        </div>
                    </td>
                    <td class="d-none d-xl-table-cell">
                        <strong>Christina Mason</strong>
                        <div class="text-muted">
                            HTML, JS, Vue
                        </div>
                    </td>
                    <td class="d-none d-xl-table-cell text-end">
                        250
                    </td>
                    <td>
                        <span class="badge badge-warning-light">Paused</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>