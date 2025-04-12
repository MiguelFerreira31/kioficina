<section class="of-depo">

    <div class="site">

        <div class="of-cabecalho">
            <div class="texto-fundo">Depoimento</div>
            <h2>DEPOIMENTO DE NOSSOS <br> CLIENTES</h2>
        </div>


        <div class="depo">

            <div class="slide-depo">
                <?php foreach ($depoimentos as $depoimento): ?>
                    <div>
                        <div class="depo-box">
                            <div class="depo-info">
                                <div class="depo-titulo">
                                    <div>
                                        <h5><?php echo $depoimento['nome_cliente'] ?></h5>
                                        <p><?php echo $depoimento['cidade_cliente'] ?>, <?php echo $depoimento['sigla_uf'] ?></p>
                                    </div>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="109" height="81"
                                            viewBox="0 0 109 81" fill="none">
                                            <g opacity="0.7" clip-path="url(#clip0_219_726)">
                                                <path
                                                    d="M24.8606 80.2504C27.2135 76.6896 47.9194 44.6582 51.3233 31.1053C53.5194 22.3053 51.8096 15.5445 45.739 9.14449C36.0449 -1.09865 19.8567 -1.11431 11.0096 6.43079C1.59785 14.4622 -1.14726 29.8504 5.45666 39.2622C10.539 46.4935 15.2292 48.219 25.1586 51.4503C25.4253 56.5797 24.9861 77.0975 24.8606 80.2504Z"
                                                    fill="#FFFF00"></path>
                                                <path
                                                    d="M81.2214 80.2504C83.5743 76.6896 104.28 44.6582 107.668 31.1053C109.88 22.3053 108.155 15.5445 102.084 9.14449C92.4057 -1.09865 76.2175 -1.11431 67.3704 6.43079C57.9586 14.4622 55.1978 29.8504 61.8174 39.2622C66.8841 46.4935 71.5743 48.219 81.5194 51.4503C81.7861 56.5797 81.3312 77.0975 81.2214 80.2504Z"
                                                    fill="#FFFF00"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_219_7263">
                                                    <rect width="108.235" height="80" fill="white"
                                                        transform="translate(0.671997 0.966797)"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                </div>
                                <div class="depo-descricao">
                                    <h4>“<?php echo $depoimento['descricao_depoimento'] ?>”</h4>
                                </div>
                                <div class="depo-estrelas">
                                    <!-- Exibir estrelas -->
                                    <?php
                                    $nota = (int)$depoimento['nota_depoimento']; // Garantir que seja um número inteiro
                                    for ($i = 0; $i < $nota; $i++): ?>
                                        <img src="http://localhost/kioficina/public/uploads/cliente/estrela.png" alt="Estrela">
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <div>
                                <img src="<?php
                                            $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/kioficina/public/uploads/" . $depoimento['foto_cliente'];

                                            if ($depoimento['foto_cliente'] != "") {
                                                if (file_exists($caminhoArquivo)) {
                                                    echo ("http://localhost/kioficina/public/uploads/" . htmlspecialchars($depoimento['foto_cliente'], ENT_QUOTES, 'UTF-8'));
                                                } else {
                                                    echo ("http://localhost/kioficina/public/uploads/cliente/sem-foto-cliente.png");
                                                }
                                            } else {
                                                echo ("http://localhost/kioficina/public/uploads/cliente/sem-foto-cliente.png");
                                            }
                                            ?>" alt="<?php echo $depoimento['alt_foto_cliente'] ?>" class="depo-slide-img">
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="depo-img">
                <img src="http://localhost/kioficina/public/assets/img/testimaonial-img-bg.png" alt="...">
            </div>
        </div>
    </div>
</section>