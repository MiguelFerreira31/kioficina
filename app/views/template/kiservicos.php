<section class="ki-servicos">
        <div class="site">
            <div class="ki-servicos-cabecalho">
                <div class="texto-fundo">Serviços</div>
                <h2 class="ki-servicos-titulo"> <span> Ki </span><br> Serviços</h2>
                <p class="ki-servicos-subtitulo">Oferecemos uma gama completa de serviços automotivos, voltados para
                    garantir o desempenho, a segurança e a durabilidade do seu veículo. Desde manutenções preventivas
                    até reparos especializados, nossa equipe de profissionais qualificados utiliza tecnologia de ponta
                    para entregar resultados rápidos e eficientes.</p>
                <a href="#">Ver Todos os Serviços</a>

                
            </div>

            <div class="ki-servicos-itens">
                <div class="servico">

                <?php foreach($servicos as $servico): ?>

                    <div class="ki-servicos-card">
                        <a href="#">
                            <img src="<?php                            
                           $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/kioficina/public/uploads/" . $servico['foto_galeria'];
                           
                            if($servico['foto_galeria'] != ""){   
                                if(file_exists($caminhoArquivo)){
                                    echo ("http://localhost/kioficina/public/uploads/".htmlspecialchars($servico['foto_galeria'], ENT_QUOTES, 'UTF-8'));
                                }else{
                                    echo ("http://localhost/kioficina/public/uploads/servico/sem-foto-servico.png");
                                }
                            }else{
                                echo ("http://localhost/kioficina/public/uploads/servico/sem-foto-servico.png");
                            }                            
                            ?>" alt="<?php echo htmlspecialchars($servico['nome_servico'], ENT_QUOTES, 'UTF-8');  ?>">
                        </a>
                        <div class="servico-card-info">
                            <a href="#" class="card-titulo">
                            <?php echo htmlspecialchars($servico['nome_servico'], ENT_QUOTES, 'UTF-8');  ?>
                            </a>
                            <p class="card-desc">
                                <?php echo htmlspecialchars($servico['descricao_servico'], ENT_QUOTES, 'UTF-8');  ?>
                            </p>
                            <a href="<?php echo "servicos/detalhe/" . htmlspecialchars($servico['link_servico'], ENT_QUOTES, 'UTF-8');  ?>">ver mais</a>
                        </div>
                    </div>

                <?php endforeach ?>


                </div>
            </div>
        </div>
    </section>