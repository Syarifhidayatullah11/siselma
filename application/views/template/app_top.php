<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Syarif Hidayatullah">
    <title>Syarif Hidayaatullah</title>
    <link href="<?= base_url('public') ?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('public') ?>/lib/highchart/code/css/highcharts.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?= base_url('public') ?>/dashboard/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="<?= site_url('index') ?>">
            PMB AMD Academy <br>
            |by Syarif Hidayatullah|<br>
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">Sign out</a>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column mt-3">
                        <li class="nav-item">
                            <a class="nav-link <?= activeMenu('index', 'active') ?>" aria-current="page" href="<?= site_url('index') ?>">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= activeMenu('index/pendaftarprodi1', 'active') ?>" href="<?= site_url('index/pendaftarprodi1') ?>">
                                <span data-feather="list" class="align-text-bottom"></span>
                                Grafik Pendaftar Prodi 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= activeMenu('index/pendaftarprodi2', 'active') ?>" href="<?= site_url('index/pendaftarprodi2') ?>">
                                <span data-feather="menu" class="align-text-bottom"></span>
                                Grafik Pendaftar Prodi 2
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= activeMenu('index/pendaftarprestasi', 'active') ?>" href="<?= site_url('index/pendaftarprestasi') ?>">
                                <span data-feather="inbox" class="align-text-bottom"></span>
                                Grafik Pendaftar Prestasi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= activeMenu('index/pendaftarjalur', 'active') ?>" href="<?= site_url('index/pendaftarjalur') ?>">
                                <span data-feather="align-center" class="align-text-bottom"></span>
                                Grafik Pendaftar Jalur Masuk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= activeMenu('index/grafikpendapatan', 'active') ?>" href="<?= site_url('index/grafikpendapatan') ?>">
                                <span data-feather="list" class="align-text-bottom"></span>
                                Grafik Pendapatan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= activeMenu('index/pendaftarbank', 'active') ?>" href="<?= site_url('index/pendaftarbank') ?>">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Grafik Pendaftar Berdasarkan Bank
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>