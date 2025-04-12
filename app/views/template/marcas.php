<section class="marcas">
        <div class="site">
            <h4>Marcas Confiável</h4>
            <div>
                <?php foreach($marcas as $marca): ?>
                    <img src="<?php                            
                           $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/kioficina/public/uploads/" . $marca['logo_marca'];
                           
                            if($marca['logo_marca'] != ""){   
                                if(file_exists($caminhoArquivo)){
                                    echo ("http://localhost/kioficina/public/uploads/".htmlspecialchars($marca['logo_marca'], ENT_QUOTES, 'UTF-8'));
                                }else{
                                    echo ("http://localhost/kioficina/public/uploads/marca/sem-foto-marca.png");
                                }
                            }else{
                                echo ("http://localhost/kioficina/public/uploads/marca/sem-foto-marca.png");
                            }                            
                            ?>" alt="<?php echo ($marca['alt_marca']) ?>">                    
                <?php endforeach ?>
            </div>
        </div>
    </section>