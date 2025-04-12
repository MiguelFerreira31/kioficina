<!DOCTYPE html>
<html class="no-js" lang="pt-br">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Miguel Ferreira">

    <!-- Favicon Icon -->
    <link rel="icon" href="<?php BASE_URL ?>assets/img/favicon.svg">



    <title> <?php echo isset($titulo) ? $titulo : 'Sobre - Ki Oficina'; ?> </title>

    <link rel="stylesheet" href="<?php BASE_URL ?>assets/css/reset.css">

    <!-- SLICK -->
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">

    <!-- LITY -->
    <link rel="stylesheet" href="assets/css/lity.css">

    <!-- CSS DO TEMPLAITE -->
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/assets/css/plugins/lightgallery.min.css" />
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/assets/css/plugins/swiper.min.css" />
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/assets/css/plugins/aos.css" />
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/assets/css/plugins/bootstrap.min.css" />
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/assets/css/style.css" />
    <link rel="stylesheet" href="http://localhost/kioficina/public/assets/css/reset.css">

    <link rel="stylesheet" href="assets/css/estilo.css">
</head>

<body>
    <?php require_once('template/preloader.php'); ?>

    <?php require_once('template/topo.php'); ?>

    <div data-src="assets/img/about-page-title.jpg" class="ak-bg">
        <div class="ak-height-100 ak-height-lg-100"></div>
        <div class="ak-height-125 ak-height-lg-40"></div>
        <div class="container">
            <div class="common-page-title">
                <h3 class="page-title">About Us</h3>
                <div class="d-flex gap-2 align-items-center">
                    <p>Home /</p>
                    <a href="/about.html">About Us</a>
                </div>
            </div>
        </div>
        <div class="ak-height-100 ak-height-lg-100"></div>
    </div>

    <div class="ak-height-125 ak-height-lg-80"></div>
    <div class="container">
        <div class="company-tab">
            <ul class="tabs">
                <li class="active-tab">Mission</li>
                <li>Vision</li>
                <li>History</li>
            </ul>

            <div class="tabs-content">
                <div class="list">
                    <div class="ak-section-heading ak-style-1 ak-type-1">
                        <div class="background-text">About Company</div>
                        <h3 class="desp">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's stan. Lorem Ipsum is simply dummy text of the
                            printing
                            and typesetting industry.</h3>
                    </div>
                </div>
                <div class="list">
                    <div class="ak-section-heading ak-style-1 ak-type-1">
                        <div class="background-text">About Company</div>
                        <h3 class="desp"> Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            been the industry's stanLorem Ipsum has.
                        </h3>
                    </div>
                </div>
                <div class="list">
                    <div class="ak-section-heading ak-style-1 ak-type-1">
                        <div class="background-text">About Company</div>
                        <h3 class="desp"> Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has
                            been the industry's stan.</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ak-height-125 ak-height-lg-80"></div>
    <?php require_once('template/pq-escolher.php'); ?>


    <div class="ak-height-125 ak-height-lg-80"></div>
    <div class="ak-primary-bg">
        <div class="ak-height-65 ak-height-lg-50"></div>
        <div class="container auto-counter-section">
            <div class="row align-items-center gap-lg-0">
                <div class="col-lg-4">
                    <div class="ak-funfact ak-style1" data-aos="fade-up">
                        <div class="ak-funfact-number color-1">
                            <div>
                                <span id="count" class="ak-stroke-number color-white counter" data-number="10"></span>
                            </div>
                            <div><span class="ak-stroke-number color-white">+</span></div>
                        </div>
                        <div class="ak-funfact-text">
                            <p>YEARS OF SERVICE</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ak-funfact ak-style1" data-aos="fade-up" data-aos-delay="100">
                        <div class="ak-funfact-number">
                            <div>
                                <span id="count" class="ak-stroke-number color-white counter" data-number="256"></span>
                            </div>
                            <div><span class="ak-stroke-number color-white">+</span></div>
                        </div>

                        <div class="ak-funfact-text">
                            <p>HAPPY CUSTOMERS</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ak-funfact ak-style1" data-aos="fade-up" data-aos-delay="150">
                        <div class="ak-funfact-number">
                            <div>
                                <span id="count" class="ak-stroke-number color-white counter" data-number="112"></span>
                            </div>
                            <div><span class="ak-stroke-number color-white">+</span></div>
                        </div>
                        <div class="ak-funfact-text">
                            <p>CUSTOMER SATISFACTION</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ak-height-65 ak-height-lg-50"></div>
    </div>

    <!-- Depoimentos -->
    <div class="ak-height-125 ak-height-lg-80"></div>
    <?php require_once('template/depoimento.php'); ?>

    <!-- Equipe -->
    <div class="ak-height-190 ak-height-lg-80"></div>
    <?php require_once('template/equipe.php'); ?>

    <!-- Logos - Marcas -->
    <div class="ak-height-125 ak-height-lg-80"></div>
    <?php require_once('template/marcas.php'); ?>


    <!-- Rodape -->
    <div class="ak-height-125 ak-height-lg-80"></div>
    <?php require_once('template/rodape.php'); ?>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- SLICK -->
    <script src="assets/js/slick.js"></script>

    <!-- LITY -->
    <script src="assets/js/lity.min.js"></script>


    <!-- Biblioteca do template -->
    <script src="vendors/assets/js/plugins/lightgallery.min.js"></script>
    <script src="vendors/assets/js/plugins/simplePagination.min.js"></script>
    <script src="vendors/assets/js/plugins/aos.js"></script>
    <script src="vendors/assets/js/plugins/swiper.min.js"></script>
    <script src="vendors/assets/js/plugins/SplitText.min.js"></script>
    <script src="vendors/assets/js/main.js"></script>


    <script src="assets/js/oficina.js"></script>


</body>

</html>