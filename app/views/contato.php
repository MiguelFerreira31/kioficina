<!DOCTYPE html>
<html class="no-js" lang="pt-br">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Miguel Ferreira">

    <!-- Favicon Icon -->
    <link rel="icon" href="http://localhost/kioficina/public/assets/img/favicon.svg">



    <title> <?php echo isset($titulo) ? $titulo : 'Contato - Ki Oficina'; ?> </title>
   

    <!-- SLICK -->
    <link rel="stylesheet" href="http://localhost/kioficina/public/assets/css/slick.css">
    <link rel="stylesheet" href="http://localhost/kioficina/public/assets/css/slick-theme.css">

    <!-- LITY -->
    <link rel="stylesheet" href="http://localhost/kioficina/public/assets/css/lity.css">


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

    <!-- Iniciar seção de cabeçalho -->
    <?php require_once('template/topo.php'); ?>
    <!-- Seção final do cabeçalho -->


    <!--Start form-->
    <div class="ak-height-125 ak-height-lg-80"></div>
    <div class="ak-height-125 ak-height-lg-80"></div>
    <div class="container pg-contato-oficina">
        <div class="contact-content">
            <div class="contact-title-section" data-aos="fade-up" data-aos-delay="700">
                <h2 class="contact-form-title ak-white-color text-uppercase">Contato</h2>
                <p>Home / Contato</p>
            </div>
            <div class="ak-height-25 ak-height-lg-20"></div>
            <div class="contact-form" data-aos="fade-up" data-aos-delay="750">
                <div>
                    <h5 class="mb-3">Precisa de ajuda ou deseja agendar um serviço?</h5>
                    <p>Na KiOficina, estamos prontos para ajudar! Preencha o formulário abaixo com suas informações e detalhes sobre o que você precisa. Nossa equipe responderá o mais breve possível.</p>
                    <div class="ak-height-45 ak-height-lg-30"></div>
                </div>
                <div id="ak-alert"></div>
                <form method="POST" action="contato/enviarEmail">
                    <div class="from-inputs">
                        <div class="type_1">
                            <label for="name" class="form-label">Nome*</label>
                            <input type="text" name="nome" id="name" required>
                        </div>
                        <div class="type_1">
                            <label for="email" class="form-label">E-mail*</label>
                            <input type="email" name="email" id="email" required>
                        </div>
                    </div>
                    <div class="from-inputs ">
                        <div class="type_1">
                            <label for="topic" class="form-label">Telefone/Celular</label>
                            <input type="tel" name="tel" id="tel" required>
                        </div>
                        <div class="type_1">
                            <label for="subject" class="form-label">Assunto</label>
                            <input type="text" name="assunto" id="asunto">
                        </div>
                    </div>
                    <div class="from-textarea">
                        <div class="type_1">
                            <label for="msg" class="form-label">Mensagem*</label>
                            <textarea name="msg" rows="5" id="msg" required></textarea>
                        </div>
                    </div>

                    <div class="ak-height-40 ak-height-lg-20"></div>
                    <input type="submit" value="Enviar Mensagem" class="common-btn">
                </form>
            </div>
        </div>
    </div>
    <!--End form -->


    <!-- Start Footer -->
    <div class="ak-height-125 ak-height-lg-80"></div>


  
    <span class="ak-scrollup">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 10L1.7625 11.7625L8.75 4.7875V20H11.25V4.7875L18.225 11.775L20 10L10 0L0 10Z"
                fill="currentColor" />
        </svg>
    </span>


    <!-- Rodape -->
    <?php require_once('template/rodape.php'); ?>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- SLICK -->
    <script src="http://localhost/kioficina/public/assets/js/slick.js"></script>

    <!-- LITY -->
    <script src="http://localhost/kioficina/public/assets/js/lity.min.js"></script>


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