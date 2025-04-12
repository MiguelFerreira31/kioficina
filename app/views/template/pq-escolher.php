<section class="pq-escolher">
    <div class="site">
        <div class="pq-info">
            <div class="pq-cabecalho">
                <div class="texto-fundo">KiOficina</div>
                <h2 class="pq-titulo">Por que nos escolher?</h2>
                <p class="pq-subtitulo">Na KiOficina, oferecemos um serviço automotivo de excelência, com
                    profissionais qualificados, atendimento personalizado e soluções eficientes para garantir sua
                    segurança e satisfação.</p>
            </div>
            <div class="pq-texto">
                <?php foreach ($especialidades as $especialidade): ?>
                    <h3><?php echo htmlspecialchars($especialidade['nome_especialidade'], ENT_QUOTES, 'UTF-8');  ?></h3>
                <?php endforeach; ?>
            </div>
            <a href="http://localhost/kioficina/public/servicos" class="pq-btn">saiba mais</a>
        </div>
        <div class="pq-img">
            <img src="assets/img/choose-us.png" alt="...">
            <img class="circulo-img" src="assets/img/Circle.png" alt="...">
        </div>
    </div>
</section>