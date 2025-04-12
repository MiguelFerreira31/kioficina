<!DOCTYPE html>
<html class="no-js" lang="pt-br">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Miguel Ferreira">

    <!-- Favicon Icon -->
    <link rel="icon" href="http://localhost/kioficina/public/assets/img/favicon.svg">


    <title> <?php echo isset($titulo) ? $titulo : 'Serviços - Ki Oficina'; ?> </title>
    <!-- CSS DO TEMPLAITE -->
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/assets/css/plugins/lightgallery.min.css" />
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/assets/css/plugins/swiper.min.css" />
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/assets/css/plugins/aos.css" />
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/assets/css/plugins/bootstrap.min.css" />
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/assets/css/style.css" />


    <link rel="stylesheet" href="http://localhost/kioficina/public/assets/css/reset.css">
    <link rel="stylesheet" href="http://localhost/kioficina/public/assets/css/estilo.css">
</head>

<body>
    <?php //require_once('template/preloader.php'); ?>

    <?php require_once('template/topo.php'); ?>


    <!-- Start common page title  -->
    <div class="ak-height-125 ak-height-lg-80"></div>
    <div class="container">
        <div class="d-md-flex justify-content-between align-items-center">
            <div class="common-page-title">
                <h3 class="page-title"><?php echo $detalhe['nome_servico']; ?></h3>
                <div class="d-flex gap-2 align-items-center">
                    <p>Home /</p>
                    <a href="/services">Serviços</a>
                </div>
            </div>
           
        </div>
        <div class="primary-color-border"></div>
    </div>
    <!-- End common page title  -->


    <!-- Start ALl Content -->
    <div class="ak-height-75 ak-height-lg-80"></div>
    <div class="d-flex justify-content-center">
        <div class="sticky-content container">
            <div class="content">
                <div class="single-blog-list" data-aos="fade-up">
                    <h4 class="single-blog-title"><?php echo $detalhe['nome_servico']; ?></h4>
                    <p class="single-blog-desp">
                    <?php echo $detalhe['descricao_servico']; ?>
                    </p>
                    <img src="assets//img/services-single.jpg" data-aos="fade-up" class="img-fluid" alt="...">
                    <div class="ak-height-50 ak-height-lg-50"></div>
                </div>
                <div class="single-blog-list" data-aos="fade-up">
                    <h4 class="single-blog-title">1. Tire Rotation:</h4>
                    <p class="single-blog-desp">Regular tire rotation is essential for even tread wear and
                        longevity.
                        Our technicians will rotate your tires according to your vehicle's specifications, promoting
                        balanced wear patterns and extending the life of your tires.</p>
                </div>
                <div class="single-blog-list" data-aos="fade-up">
                    <h4 class="single-blog-title">2. Tire Balancing:</h4>
                    <p class="single-blog-desp">Imbalanced tires can lead to uneven wear, vibrations, and handling
                        issues. Our precision tire balancing services ensure that each tire and wheel assembly is
                        balanced, enhancing your vehicle's ride comfort and overall performance.
                    </p>
                </div>
                <div class="single-blog-list" data-aos="fade-up">
                    <h4 class="single-blog-title">3. Wheel Alignment:</h4>
                    <p class="single-blog-desp">
                        Proper wheel alignment is crucial for maintaining vehicle stability and preventing uneven
                        tire
                        wear. Our advanced alignment equipment and skilled technicians will ensure that your wheels
                        are
                        aligned to manufacturer specifications.
                    </p>
                    <div class="d-flex gap-3 flex-nowrap flex-md-wrap">
                        <img src="assets/img/services-single-2.jpg" class="img-fluid" alt="...">
                        <img src="assets/img/services-single-3.jpg" class="img-fluid d-none d-lg-block" alt="...">
                    </div>
                    <div class="ak-height-50 ak-height-lg-50"></div>
                </div>
                <div class="single-blog-list" data-aos="fade-up">
                    <h4 class="single-blog-title">4. Tire Repair:</h4>
                    <p class="single-blog-desp">
                        If you've experienced a flat tire or puncture, our tire repair services are here to help.
                        We'll
                        assess the damage and, when possible, perform a professional repair to get you back on the
                        road
                        safely.
                    </p>
                </div>
            </div>
            <div class="sidebar">
                <div class="d-flex flex-column gap-4 align-items-xxl-end">
                    <div class="service-card-style-2" data-aos="fade-up">
                        <div class="service-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="47" viewBox="0 0 46 47"
                                fill="none">
                                <g clip-path="url(#clip0_348_372)">
                                    <path
                                        d="M20.9088 0.898239C20.3309 0.898239 19.8633 1.36585 19.8633 1.94373V9.5549C19.8633 11.5784 21.2518 13.2987 23.1651 13.6459C28.2709 14.5729 32.325 18.6271 33.2521 23.7329C33.5993 25.6462 35.3196 27.0347 37.3431 27.0347H44.9543C45.5322 27.0347 45.9998 26.567 45.9998 25.9892C45.9997 12.1543 34.7438 0.898239 20.9088 0.898239ZM38.4477 22.915C38.3661 22.9335 38.2854 22.9426 38.2057 22.9426C37.732 22.9426 37.3032 22.6189 37.1889 22.1381C35.7452 16.0318 30.8671 11.1537 24.7597 9.708C24.1982 9.57529 23.8501 9.0127 23.9838 8.45022C24.1165 7.88763 24.6689 7.53646 25.2416 7.67426C32.1116 9.29958 37.6002 14.7872 39.2246 21.6562C39.3575 22.2188 39.0092 22.7813 38.4477 22.915Z"
                                        fill="white" />
                                    <path
                                        d="M40.3236 29.1255H37.3433C34.308 29.1255 31.722 27.0142 31.1962 24.1045C30.4223 19.8512 27.045 16.4749 22.7907 15.7021C19.883 15.1763 17.7727 12.5902 17.7727 9.55491V6.57477C17.7727 6.25928 17.6298 5.96014 17.3848 5.76206C17.1377 5.56192 16.8161 5.48332 16.5078 5.55281C6.94244 7.60389 0 16.1982 0 25.9892C0 37.5187 9.3795 46.8982 20.9091 46.8982C30.7 46.8982 39.2943 39.9558 41.3454 30.3905C41.4118 30.0812 41.3352 29.7595 41.1362 29.5135C40.9382 29.2684 40.639 29.1255 40.3236 29.1255ZM11.5 13.4437C13.2295 13.4437 14.6363 14.8506 14.6363 16.5801C14.6363 18.3096 13.2295 19.7164 11.5 19.7164C9.77047 19.7164 8.36361 18.3096 8.36361 16.5801C8.36361 14.8506 9.77047 13.4437 11.5 13.4437ZM11.5 38.5346C9.77047 38.5346 8.36361 37.1278 8.36361 35.3983C8.36361 33.6688 9.77047 32.2619 11.5 32.2619C13.2295 32.2619 14.6363 33.6688 14.6363 35.3983C14.6363 37.1278 13.2295 38.5346 11.5 38.5346ZM20.9091 32.2619C17.4501 32.2619 14.6363 29.4482 14.6363 25.9892C14.6363 22.5302 17.4501 19.7164 20.9091 19.7164C24.3681 19.7164 27.1818 22.5302 27.1818 25.9892C27.1818 29.4482 24.3681 32.2619 20.9091 32.2619ZM30.3182 38.5346C28.5887 38.5346 27.1818 37.1278 27.1818 35.3983C27.1818 33.6688 28.5887 32.2619 30.3182 32.2619C32.0477 32.2619 33.4545 33.6688 33.4545 35.3983C33.4545 37.1278 32.0477 38.5346 30.3182 38.5346Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_348_372">
                                        <rect width="46" height="46" fill="white" transform="translate(0 0.898239)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <div class="service-desp">
                            <a href="services-single.html" class="title">Brake System Repair</a>
                            <p class="desp">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.
                                Lorem
                                Ipsum has been
                                the industry's stan.</p>
                            <a href="services-single.html" class="more-btn ">VIEW MORE</a>
                        </div>
                    </div>
                    <div class="service-card-style-2" data-aos="fade-up">
                        <div class="service-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="47" viewBox="0 0 46 47"
                                fill="none">
                                <g clip-path="url(#clip0_348_356)">
                                    <path
                                        d="M0.276371 7.86304C0.521661 6.84208 1.79348 6.47989 2.53968 7.22618L7.50441 12.1936H11.3185V8.37949L6.36035 3.42393C5.61766 2.68123 5.97562 1.41076 6.99146 1.16197C9.33599 0.587828 13.1402 0.673545 16.0814 3.61378C18.6547 6.18707 19.4813 10.0281 18.272 13.4289L33.444 28.6009C36.8448 27.3916 40.6858 28.2182 43.2591 30.7915C46.1254 33.6578 46.2943 37.5013 45.7216 39.885C45.4764 40.9059 44.2045 41.2681 43.4583 40.5218L38.4936 35.5544H34.6795V39.3685L39.6364 44.3227C40.3793 45.0656 40.021 46.3363 39.0048 46.5848C36.6613 47.1578 32.8584 47.075 29.9167 44.1341C27.3434 41.5608 26.5168 37.7198 27.7261 34.319L12.5541 19.147C9.15333 20.3563 5.31316 19.5297 2.73897 16.9564C-0.127413 14.0902 -0.29624 10.2467 0.276371 7.86304Z"
                                        fill="white" />
                                    <path
                                        d="M22.9986 33.4044L11.5006 44.9015C9.19951 47.2026 5.63428 47.4892 3.01966 45.7587L13.4072 35.3721C13.9328 34.8456 13.9328 33.992 13.4072 33.4655C12.8807 32.9398 12.0271 32.9398 11.5006 33.4655L1.11395 43.853C-0.616549 41.2383 -0.330828 37.6731 1.97112 35.3721L13.4683 23.874L22.9986 33.4044Z"
                                        fill="white" />
                                    <path
                                        d="M45.8578 4.7289L42.0454 12.3526C41.8478 12.7489 41.4686 13.022 41.0301 13.0849L34.8045 13.9735L28.7163 20.0617L26.8105 18.156L32.8979 12.0687L33.7874 5.84213C33.8503 5.40367 34.1234 5.0245 34.5196 4.82683L42.1434 1.01452C42.6618 0.755751 43.289 0.857281 43.6987 1.26699L45.6053 3.1736C46.015 3.58332 46.1165 4.21047 45.8578 4.7289Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_348_356">
                                        <rect width="46" height="46" fill="white" transform="translate(0 0.872437)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <div class="service-desp">
                            <a href="services-single.html" class="title">Routine Maintenance</a>
                            <p class="desp">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.
                                Lorem
                                Ipsum has been
                                the industry's stan.</p>
                            <a href="services-single.html" class="more-btn ">VIEW MORE</a>
                        </div>
                    </div>
                    <div class="service-card-style-2" data-aos="fade-up">
                        <div class="service-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="47" height="47" viewBox="0 0 47 47"
                                fill="none">
                                <path
                                    d="M19.5293 25.4204H26.7225V19.6704H11.6834L13.8627 14.7916C14.0912 14.2626 14.6102 13.9204 15.1852 13.9204H24.0545C23.7771 12.4671 23.7728 11.0914 24.0603 9.60793H15.1852C12.8823 9.60793 10.808 10.9764 9.90092 13.0924L6.78442 20.3662C4.96886 21.3336 3.7168 23.2239 3.7168 25.4204V28.2954C3.7168 30.4143 4.88117 32.2486 6.5918 33.2462V38.3579C6.5918 39.9435 7.88123 41.2329 9.4668 41.2329H13.7793C15.3649 41.2329 16.6543 39.9435 16.6543 38.3579V34.0454H26.7225V28.2954H19.5293C18.7358 28.2954 18.0918 27.6514 18.0918 26.8579C18.0918 26.0644 18.7358 25.4204 19.5293 25.4204ZM11.623 30.4517C9.63786 30.4517 8.0293 28.8431 8.0293 26.8579C8.0293 24.8727 9.63786 23.2642 11.623 23.2642C13.6082 23.2642 15.2168 24.8727 15.2168 26.8579C15.2168 28.8431 13.6082 30.4517 11.623 30.4517Z"
                                    fill="white" />
                                <path
                                    d="M43.8548 10.2936C43.2612 6.89105 40.4063 4.45737 38.7704 3.96143C38.4944 3.87805 38.2227 4.09655 38.2227 4.38405V11.596C38.2227 12.1408 37.9151 12.6382 37.4278 12.8811L35.9903 13.5999C35.5849 13.8026 35.1091 13.8026 34.7051 13.5999L33.2676 12.8811C32.7803 12.6382 32.4727 12.1394 32.4727 11.596V4.38405C32.4727 4.09512 32.1996 3.87662 31.9221 3.96143C30.2848 4.46887 27.4314 6.93993 26.842 10.3137C26.336 13.2117 27.4228 16.0537 29.1377 17.7701C29.4195 18.0518 29.5963 18.4155 29.5963 18.8137V38.3594C29.5963 41.5334 32.1694 44.1065 35.3434 44.1065C38.5174 44.1065 41.0905 41.5334 41.0905 38.3594L41.0948 18.8209C41.0948 18.4184 41.2774 18.0475 41.562 17.7614C43.2885 16.0364 44.3594 13.1816 43.8548 10.2936ZM35.3549 40.5142C34.1646 40.5142 33.1986 39.5482 33.1986 38.3579C33.1986 37.1677 34.1646 36.2017 35.3549 36.2017C36.5452 36.2017 37.5112 37.1677 37.5112 38.3579C37.5112 39.5482 36.5452 40.5142 35.3549 40.5142Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="service-desp">
                            <a href="services-single.html" class="title">Diagnostic Services</a>
                            <p class="desp">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry.
                                Lorem
                                Ipsum has been
                                the industry's stan.</p>
                            <a href="services-single.html" class="more-btn ">VIEW MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll-end-point"></div>
    <!-- End ALl Content -->






    <!-- Rodape -->
    <div class="ak-height-125 ak-height-lg-80"></div>
    <?php require_once('template/rodape.php'); ?>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


    <!-- Biblioteca do template -->
    <script src="http://localhost/kioficina/public/vendors/assets/js/plugins/lightgallery.min.js"></script>
    <script src="http://localhost/kioficina/public/vendors/assets/js/plugins/simplePagination.min.js"></script>
    <script src="http://localhost/kioficina/public/vendors/assets/js/plugins/aos.js"></script>
    <script src="http://localhost/kioficina/public/vendors/assets/js/plugins/swiper.min.js"></script>
    <script src="http://localhost/kioficina/public/vendors/assets/js/plugins/SplitText.min.js"></script>
    <script src="http://localhost/kioficina/public/vendors/assets/js/main.js"></script>


    <script src="http://localhost/kioficina/public/assets/js/oficina.js"></script>


</body>

</html>