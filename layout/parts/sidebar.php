<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="">
            <span class="align-middle">Ges-Commandes</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Tableau de bord
            </li>

            <li class="sidebar-item <?= is_active('admin') ?>">
                <a class="sidebar-link" href="/admin/">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header">
                Produits
            </li>

            <li class="sidebar-item <?= is_active('admin/produits') ?>">
                <a class="sidebar-link" href="/admin/produits/">
                    <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Produits</span>
                </a>
            </li>

            <li class="sidebar-item <?= is_active('admin/categories') ?>">
                <a class="sidebar-link" href="/admin/categories/">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Catégories</span>
                </a>
            </li>

            <li class="sidebar-header">
                Commandes
            </li>

            <li class="sidebar-item <?= is_active('admin/commandes') ?>">
                <a class="sidebar-link" href="/admin/commandes">
                    <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Commandes</span>
                </a>
            </li>

            <li class="sidebar-item <?= is_active('admin/livreurs') ?>">
                <a class="sidebar-link" href="/admin/livreurs">
                    <i class="align-middle" data-feather="truck"></i> <span class="align-middle">Livreurs</span>
                </a>
            </li>

            <li class="sidebar-header">
                Clients
            </li>

            <li class="sidebar-item <?= is_active('admin/clients') ?>">
                <a class="sidebar-link" href="/admin/clients">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Clients</span>
                </a>
            </li>
    </div>
</nav>