<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dinas Cipta Karya</title>
    <!-- Bootstrap -->
    <link href="/landing/css/bootstrap.min.css" rel="stylesheet">
    <!-- Hover CSS -->
    <!-- <link rel="stylesheet" href="/landing/css/hover.css"> -->
    <!-- Reset CSS -->
    <link rel="stylesheet" href="/landing/css/reset.css">
    <!-- Slick CSS  -->
    <link rel="stylesheet" href="/landing/slick/slick.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="/landing/css/font-awesome.min.css">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="/landing/style.css">
    <!-- The Leader colors. We have chosen the color Orange for this default
          page. However, you can choose any other color by changing color css file.
    -->
    <link rel="stylesheet" type="text/css" href="/landing/css/colors/default-orange.css">
    <!-- <link rel="stylesheet" type="text/css" href="/landing/css/colors/green.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="/landing/css/colors/mustard.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="/landing/css/colors/pink.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="/landing/css/colors/turquoise.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="/landing/css/colors/purple.css"> -->

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/landing/css/responsive.css">
    <!--[if lt IE 9]>
      <script src="/landing/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="/landing/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .dropdown-menu>li>a {
            color: #333 !important;
        }
    </style>
</head>
<body class="js">
    <!-- Page loader -->
    <div id="preloader"></div>
    <!-- MENU section START -->
    <div class="menu-area">
        <nav class="navbar menu-section">
            <div class="container menuborder">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/landing/#">
                        <img src="/logo.png" alt="team-leader" width="160px" height="50px"/>
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse search-relative navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav menu navbar-right navbar-nav">
                        <!-- <li class="active"><a href="/landing/#home">Perkenalan</a></li> -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Layanan <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Media Iklan</a></li>
                                <li><a href="#">Desain Iklan</a></li>
                                <li><a href="#">Lokasi Strategis</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Iklan Videotron <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Jl Lintas Sumatra, Depan Kantor Bupati, Harga 45 jt/Tahun, Ukuran 4x5M</a></li>
                                <li><a href="#">Jl Lintas Sumatra, Depan Kantor Koramil, Harga 38Jt/Tahun, Ukuran 4x5M</a></li>
                                <li><a href="#">Jl Imam Bonjol, Depan Taman Makjijat, Harga 58jt/Tahun, Ukuran 5x5M</a></li>
                                <li><a href="#">Jalan Lintas Sumatra, Deoan Kantor Samsat, Harga35jt/Tahun, Ukuran 3x5M</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Iklan Spanduk <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Jalan Imam Bonjol, Harga 30jt/Tahun, Ukuran 6x5M</a></li>
                                <li><a href="#">Jalan Imam Bonjol, Harga 20jt/Tahun, Ukuran 3x4M</a></li>
                                <li><a href="#">Jalan Imam Bonjol, Harga 27jt/Tahun, Ukuran 5x5M</a></li>
                                <li><a href="#">Jalan M.Yamin, Harga 20jt/Tahun, Ukuran 3x4M</a></li>
                                <li><a href="#">Jalan Diponegoro, Harga 25jt/Tahun, Ukuran 4x4M</a></li>
                            </ul>
                        </li>
                        <li><a href="/landing/#about">Tentang Iklan</a></li>
                        <li><a href="/landing/#project">Produk</a></li>
                        <?php if(session()->get('name')): ?>
                        <li><a href="/dashboard"><?=session()->get('name')?></a></li>
                        <?php else: ?>
                        <li><a href="/login">Masuk</a></li>
                        <li><a href="/register">Daftar</a></li>
                        <?php endif ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
    <!-- END of MENU section -->
    <!-- HOME section START -->
    <section class="home-area" id="home">
        <div class="overlay" style="position: absolute;background:rgba(0,0,0,0.5);width:100%;height:100%;top:0;left:0;"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="welcome-text text-center">
                        <h1>Dinas Cipta Karya (DK)</h1>
                        <p style="margin-top: 20px;color:#FFF;font-size:18px">
                            SISTEM INI MEMILIKI LAYANANAN PENYEWAAN PAPAN IKLAN SEPERTI VIDEOTRON DAN SEPANDUK DI KAB ASAHAN DENGAN HARGA YANG TERJANGKAU BAGI PENGIKLAN DAN AKAN MENINGKATKAN PAMOR PRODUK, DAERAH, TEMPAT USAHAYANG ANDA IKLAN<br><br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END of HOME section -->
    <!-- SERVICES section START -->
    <section class="our-services section-padding" id="service">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center" style="margin-bottom: 40px;">
                        <h2>Apa yang kami tawarkan ?</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 padding-l35 padding-r35">
                        <div class="signel-service text-center">
                            <span class="border-top"></span>
                            <span class="border-bottom"></span>
                            <span class="border-left"></span>
                            <span class="border-right"></span>
                            <!-- <img src="/landing/images/icon/icon-1.png" alt="icon"> -->
                            <i class="fa fa-snowflake-o"></i>
                            <h4>Media Iklan</h4>
                            <p>Kami menyediakan media iklan mulai dari Billboard hingga videotron.</p>
                        </div>
                    </div>
                    <div class="col-sm-4 padding-l35 padding-r35">
                        <div class="signel-service text-center">
                            <span class="border-top"></span>
                            <span class="border-bottom"></span>
                            <span class="border-left"></span>
                            <span class="border-right"></span>
                            <!-- <img src="/landing/images/icon/icon-2.png" alt="icon"> -->
                            <i class="fa fa-paint-brush"></i>
                            <h4>Desain Iklan</h4>
                            <p>Selain itu kamu tidak perlu repot repot untuk memikirkan desain iklan.</p>
                        </div>
                    </div>
                    <div class="col-sm-4 padding-l35 padding-r35">
                        <div class="signel-service text-center">
                            <span class="border-top"></span>
                            <span class="border-bottom"></span>
                            <span class="border-left"></span>
                            <span class="border-right"></span>
                            <!-- <img src="/landing/images/icon/icon-3.png" alt="icon"> -->
                            <i class="fa fa-line-chart"></i>
                            <h4>Lokasi Strategis</h4>
                            <p>Lokasi iklan anda akan berada pada tempat strategis sesuai dengan pilihan anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END of SERVICES section -->
    <!-- ABOUT section START -->
    <div class="padding-top" id="about">
        <section class="about-us">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 aboutbg col-md-offset-1">
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1 col-sm-6">
                                <div class="about-slider">
                                    <div class="single-slider">
                                        <img src="/landing/images/about-slide-1.jpg" alt="about">
                                    </div>
                                    <div class="single-slider">
                                        <img src="/landing/images/slide-2.jpg" alt="about">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-6">
                                <div class="about-content">
                                    <h2>Tentang Saya</h2>
                                    <p>This combined expertise ensures all our clients receive for the optimised service, both reactive and proactive, whatever their requirement. </p>
                                    <p class="italic"></p>
                                    <p class="name">- Ryan T. Allens</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- END of ABOUT section -->
    <!-- PROJECT section START -->
    <section class="portfolio-section section-padding overfolowhidden" id="project">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center" style="margin-bottom: 40px;">
                        <h2>Produk</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($mediaIklan as $media): ?>
                <div class="col-sm-4">
                    <div class="single-projects">
                        <?php if($media['tanggal_selesai'] > date('Y-m-d')): ?>
                        <a href="#" onclick="alert('Media iklan ini tidak tersedia'); return false;">
                        <?php else: ?>
                        <a href="/order?id=<?=$media['id']?>" onclick="<?= !session()->get('name') ? "alert('Login terlebih dahulu untuk memesan'); return false;" : ""?>">
                        <?php endif ?>
                            <img src="/<?=$media['foto']?>" alt="<?=$media['nama_lokasi']?>" style="margin-bottom: 20px;">
                            <h3><?=$media['nama_lokasi']?> <?=($media['tanggal_selesai'] > date('Y-m-d')) ? '(Tidak Tersedia)' : ''?></h3>
                            <h4><?=$media['jenis']?></h4>
                            <div class="projects-hover text-center">
                                <img src="/landing/images/projects/project-hover-icon.png" alt="#">
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach ?>

                <div class="col-sm-12 text-center" style="margin-bottom: 40px;">
                    <a href="/search" class="hvr-bounce-out busenessbutton">atau Cari berdasarkan lokasi strategis</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Lokasi Iklan Strategis</h4>
      </div>
      <div class="modal-body">
        <form action="" id="searchForm">
        <div class="form-group">
            <label for="">Arus Lalu lintas</label>
            <select name="lalu_lintas" id="" class="form-control">
                <option value="">Pilih</option>
                <?php foreach([
                    'Sangat Ramai' => 'Sangat Ramai',
                    'Ramai' => 'Ramai',
                    'Sedang' => 'Sedang',
                    'Sepi' => 'Sepi',
                    'Sangat Sepi' => 'Sangat Sepi',
                ] as $item): ?>
                <option value="<?=$item?>"><?=$item?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Keramaian</label>
            <select name="keramaian" id="" class="form-control">
                <option value="">Pilih</option>

                <?php foreach([
                    'Zona Super Ramai' => 'Zona Super Ramai',
                    'Ramai' => 'Ramai',
                    'Biasa Aja' => 'Biasa Aja',
                    'Sepi' => 'Sepi',
                    'Tidak ada aktivitas' => 'Tidak ada aktivitas',
                ] as $item): ?>
                <option value="<?=$item?>"><?=$item?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Zonasi</label>
            <select name="zonasi" id="" class="form-control">
                <option value="">Pilih</option>

                <?php foreach([
                    'Zona Komersial Resmi' => 'Zona Komersial Resmi',
                    'Zona Komersial Biasa' => 'Zona Komersial Biasa',
                    'Zona Campuran' => 'Zona Campuran',
                    'Zona Terbatas' => 'Zona Terbatas',
                    'Zona Terlarang' => 'Zona Terlarang',
                ] as $item): ?>
                <option value="<?=$item?>"><?=$item?></option>
                <?php endforeach ?>
            </select>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="document.querySelector('#searchForm').submit()">Cari</button>
      </div>
    </div>
  </div>
</div>
    <!-- END of PROJECT section -->
    <!-- COPYRIGHT section START -->
    <div class="copyright-section">
        <div class="container copyright">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="copyright-text">
                        <p>&copy; Dinas Cipta Karya Kabupaten Asahan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END of COPYRIGHT section -->
    <!-- Go to TOP -->
    <a href="javascript:void(0)" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- === Include Related JavaScripts === -->
    <!-- Google Map API -->
    <script src="/landing/https://maps.googleapis.com/maps/api/js?key=AIzaSyCn4uayw359fjMh4P9i2rKKZYHzXaqTRNs"></script>
    <!-- jQuery Main JS -->
    <script src="/landing/js/jquery.min.js"></script>
    <!-- jquery sticky js -->
    <script src="/landing/js/jquery.sticky.js"></script>
    <!-- Bootstrap JS -->
    <script src="/landing/js/bootstrap.min.js"></script>
    <!-- Slick JS -->
    <script src="/landing/slick/slick.min.js"></script>
    <!-- WayPoints JS -->
    <script src="/landing/js/waypoints.min.js"></script>
    <!-- Counter UP JS -->
    <script src="/landing/js/jquery.counterup.min.js"></script>
    <!-- NAV JS -->
    <script src="/landing/js/jquery.nav.js"></script>
    <!-- Google Map Active JS -->
    <script src="/landing/js/gmap.js"></script>
    <!-- Main Active JS -->
    <script src="/landing/js/active.js"></script>
</body>
</html>