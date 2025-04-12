<!DOCTYPE html>
<html class="no-js" lang="pt-br">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Miguel Ferreira">

    <!-- Favicon Icon -->
    <link rel="icon" href="<?php BASE_URL ?>assets/img/favicon.svg">



    <title> <?php echo isset($titulo) ? $titulo : 'Serviços - Ki Oficina'; ?> </title>

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
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/assets/css/style.css" />
    <link rel="stylesheet" href="http://localhost/kioficina/public/assets/css/reset.css">

    <link rel="stylesheet" href="assets/css/estilo.css">
</head>

<body>
    <?php require_once('template/preloader.php'); ?>

    <?php require_once('template/topo.php'); ?>


    <!-- Start common page title  -->
    <div class="of-height-125 of-height-80"></div>
    <div class="container">
        <div class="common-page-title">
            <h3 class="page-title">Services</h3>
            <div class="d-flex gap-2 align-items-center">
                <p>Home /</p>
                <a href="/services.html">Services</a>
            </div>
        </div>
        <div class="primary-color-border"></div>
    </div>
    <!-- End common page title  -->

    <!-- Start All Services -->
    <div class="ak-height-75 ak-height-lg-80"></div>
    <div class="container">
        <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1 g-4">
            <?php foreach ($servicos as $servico): ?>
                <div class="col">

                    <div class="service-card-style-2" data-aos="fade-up">
                        <div class="service-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="47" height="47" viewBox="0 0 47 47" fill="none">
                                <path
                                    d="M19.5293 25.4204H26.7225V19.6704H11.6834L13.8627 14.7916C14.0912 14.2626 14.6102 13.9204 15.1852 13.9204H24.0545C23.7771 12.4671 23.7728 11.0914 24.0603 9.60793H15.1852C12.8823 9.60793 10.808 10.9764 9.90092 13.0924L6.78442 20.3662C4.96886 21.3336 3.7168 23.2239 3.7168 25.4204V28.2954C3.7168 30.4143 4.88117 32.2486 6.5918 33.2462V38.3579C6.5918 39.9435 7.88123 41.2329 9.4668 41.2329H13.7793C15.3649 41.2329 16.6543 39.9435 16.6543 38.3579V34.0454H26.7225V28.2954H19.5293C18.7358 28.2954 18.0918 27.6514 18.0918 26.8579C18.0918 26.0644 18.7358 25.4204 19.5293 25.4204ZM11.623 30.4517C9.63786 30.4517 8.0293 28.8431 8.0293 26.8579C8.0293 24.8727 9.63786 23.2642 11.623 23.2642C13.6082 23.2642 15.2168 24.8727 15.2168 26.8579C15.2168 28.8431 13.6082 30.4517 11.623 30.4517Z"
                                    fill="white" />
                                <path
                                    d="M43.8548 10.2936C43.2612 6.89105 40.4063 4.45737 38.7704 3.96143C38.4944 3.87805 38.2227 4.09655 38.2227 4.38405V11.596C38.2227 12.1408 37.9151 12.6382 37.4278 12.8811L35.9903 13.5999C35.5849 13.8026 35.1091 13.8026 34.7051 13.5999L33.2676 12.8811C32.7803 12.6382 32.4727 12.1394 32.4727 11.596V4.38405C32.4727 4.09512 32.1996 3.87662 31.9221 3.96143C30.2848 4.46887 27.4314 6.93993 26.842 10.3137C26.336 13.2117 27.4228 16.0537 29.1377 17.7701C29.4195 18.0518 29.5963 18.4155 29.5963 18.8137V38.3594C29.5963 41.5334 32.1694 44.1065 35.3434 44.1065C38.5174 44.1065 41.0905 41.5334 41.0905 38.3594L41.0948 18.8209C41.0948 18.4184 41.2774 18.0475 41.562 17.7614C43.2885 16.0364 44.3594 13.1816 43.8548 10.2936ZM35.3549 40.5142C34.1646 40.5142 33.1986 39.5482 33.1986 38.3579C33.1986 37.1677 34.1646 36.2017 35.3549 36.2017C36.5452 36.2017 37.5112 37.1677 37.5112 38.3579C37.5112 39.5482 36.5452 40.5142 35.3549 40.5142Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="service-desp">
                            <a href="services-single.html" class="title"><?php echo htmlspecialchars($servico['nome_servico'], ENT_QUOTES, 'UTF-8'); ?></a>
                            <p class="desp"><?php echo htmlspecialchars($servico['descricao_servico'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <a href="<?php echo "servicos/detalhe/" . htmlspecialchars($servico['link_servico'], ENT_QUOTES, 'UTF-8'); ?>" class="more-btn">leia mais</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <!-- End All Services -->




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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <script src="assets/js/oficina.js"></script>


</body>

</html>