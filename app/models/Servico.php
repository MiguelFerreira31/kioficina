<?php



class Servico extends Model
{

    //Método para Pegar somente 3 servicos de forma aleatória
    public function getServicoAleatorio($limite = 3)
    {
        $sql = "SELECT s.*,g.foto_galeria,g.alt_galeria FROM tbl_servico s INNER JOIN tbl_galeria g ON s.id_servico = g.id_servico WHERE s.status_servico = 'Ativo' GROUP BY s.id_servico ORDER BY RAND() LIMIT :limite";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Método Listar todos os Serviços ativos por ordem alfabetica
    public function getTodosServicos()
    {

        $sql = "SELECT * FROM tbl_servico WHERE status_servico = 'Ativo' ORDER BY nome_servico ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para carregar o serviço pelo link
    public function getServicoPorLink($link)
    {

        $sql = "SELECT tbl_servico.*, tbl_galeria.* FROM tbl_servico 
                INNER JOIN tbl_galeria ON tbl_servico .id_servico = tbl_galeria.id_galeria
                WHERE status_servico = 'Ativo' AND link_servico = :link";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':link', $link);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Método para Pegar 4 Especialidade de servicos de forma aleatória
    public function getEspecialidadeAleatorio($limite = 4)
    {

        $sql = "SELECT * FROM tbl_especialidade ORDER BY RAND() LIMIT :limite";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Método para o DASHBOARD - Listar todos os serviços com galeria e especialidade
    public function getListarServicos()
    {

        $sql = "SELECT 
                    srv.*,
                    gal.foto_galeria,
                    esp.nome_especialidade
                FROM 
                    tbl_servico AS srv
                INNER JOIN 
                    tbl_galeria AS gal ON srv.id_servico = gal.id_servico
                INNER JOIN 
                    tbl_especialidade AS esp ON srv.id_especialidade = esp.id_especialidade
                WHERE 
                    srv.status_servico = 'ativo'";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // 5 METODO DASHBOARD ADICONAR SERVICO 

    public function addServico($dados)
    {

        $sql = "INSERT INTO tbl_servico (  
        nome_servico,
        descricao_servico,
        preco_base_servico,
        tempo_estimado_servico,
        id_especialidade,
        status_servico,
        link_servico) 

        VALUES(
        :nome_servico,
        :descricao_servico,
        :preco_base_servico,
        :tempo_estimado_servico,
        :id_especialidade,
        :status_servico,
        :link_servico
        
        )";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome_servico', $dados['nome_servico']);
        $stmt->bindValue(':descricao_servico', $dados['descricao_servico']);
        $stmt->bindValue(':preco_base_servico', $dados['preco_base_servico']);
        $stmt->bindValue(':tempo_estimado_servico', $dados['tempo_estimado_servico']);
        $stmt->bindValue(':id_especialidade', $dados['id_especialidade']);
        $stmt->bindValue(':status_servico', $dados['status_servico']);
        $stmt->bindValue(':link_servico', $dados['link_servico']);

        $stmt->execute();
        return $this->db->lastInsertId();
    }

    // Atualizar servico 
    public function atualizarServico($id, $dados)
    {
        $sql = "UPDATE tbl_servico 
                SET nome_servico = :nome_servico, 
                    descricao_servico = :descricao_servico, 
                    preco_base_servico = :preco_base_servico, 
                    tempo_estimado_servico = :tempo_estimado_servico, 
                    id_especialidade = :id_especialidade, 
                    status_servico = :status_servico, 
                    link_servico = :link_servico
                WHERE id_servico = :id_servico";


        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome_servico', $dados['nome_servico'], PDO::PARAM_STR);
        $stmt->bindValue(':descricao_servico', $dados['descricao_servico'], PDO::PARAM_STR);
        $stmt->bindValue(':preco_base_servico', $dados['preco_base_servico'], PDO::PARAM_STR);
        $stmt->bindValue(':tempo_estimado_servico', $dados['tempo_estimado_servico'], PDO::PARAM_STR);
        $stmt->bindValue(':id_especialidade', $dados['id_especialidade'], PDO::PARAM_INT);
        $stmt->bindValue(':status_servico', $dados['status_servico'], PDO::PARAM_STR);
        $stmt->bindValue(':link_servico', $dados['link_servico'], PDO::PARAM_STR);
        $stmt->bindValue(':id_servico', $id, PDO::PARAM_INT);

        $resultado = $stmt->execute();
        return $resultado;
    }


    // Método para buscar os dados de serviço de acordo com o ID 

    public function getServicoById($id)
    {

        $sql = "SELECT s.*,g.foto_galeria, e.nome_especialidade 
                FROM tbl_servico s   
                LEFT JOIN tbl_galeria g ON s.id_servico = g.id_servico
                INNER JOIN tbl_especialidade e ON s.id_especialidade = e.id_especialidade
                WHERE s.id_servico = :id_servico;
                LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_servico', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }




    // 6 Método para add FOTO GALERIA 

    public function addFotoGaleria($id_servico, $arquivo, $nome_servico)
    {
        $sql = "INSERT INTO tbl_galeria (foto_galeria,
                                         alt_galeria,
                                         status_galeria,
                                         id_servico)
                                         
                                         VALUES (:foto_galeria,
                                                 :alt_galeria,
                                                 :status_galeria,
                                                 :id_servico)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':foto_galeria', $arquivo);
        $stmt->bindValue(':alt_galeria', $nome_servico);
        $stmt->bindValue('status_galeria', 'Ativo');
        $stmt->bindValue(':id_servico', $id_servico);

        return $stmt->execute();
    }


    // Atualizar foto galeria 

    public function atualizarFotoGaleria($id, $arquivo, $nome_servico)
    {
        // Verifica se já existe uma entrada na galeria para o serviço
        $sqlVerificar = "SELECT id_galeria FROM tbl_galeria WHERE id_servico = :id";
        $stmtVerificar = $this->db->prepare($sqlVerificar);
        $stmtVerificar->bindValue(':id', $id, PDO::PARAM_INT);
        $stmtVerificar->execute();
        $galeria = $stmtVerificar->fetch(PDO::FETCH_ASSOC);

        if ($galeria) {
            // Atualiza se já existir
            $sql = "UPDATE tbl_galeria SET 
                        foto_galeria = :foto_galeria,
                        alt_galeria = :alt_galeria,
                        status_galeria = :status_galeria
                    WHERE id_galeria = :id_galeria";  // Removi a vírgula extra!

            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':foto_galeria', $arquivo);
            $stmt->bindValue(':alt_galeria', $nome_servico);
            $stmt->bindValue(':status_galeria', 'Ativo');
            $stmt->bindValue(':id_galeria', $galeria['id_galeria']);  // Corrigido!

            return $stmt->execute();
        } else {
            // Insere se não existir
            $sql = "INSERT INTO tbl_galeria (
                        foto_galeria, 
                        alt_galeria, 
                        status_galeria, 
                        id_servico
                    ) VALUES (
                        :foto_galeria, 
                        :alt_galeria, 
                        :status_galeria, 
                        :id_servico
                    )";

            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':foto_galeria', $arquivo);
            $stmt->bindValue(':alt_galeria', $nome_servico);
            $stmt->bindValue(':status_galeria', 'Ativo');  // Corrigido (adicionado ":")
            $stmt->bindValue(':id_servico', $id);

            return $stmt->execute();
        }
    }



    // 7 Verifica o link 

    public function existeEsseServico($link)
    {

        $sql = " SELECT count(*) AS total FROM tbl_servico WHERE link_servico =:link ";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':link', $link);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado['total'] > 0;
    }


    public function obterOuCriarEspecialidade($nome)
    {
        $sql = "INSERT INTO tbl_especialidade (nome_especialidade) VALUES (:nome)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $nome);

        if ($stmt->execute()) {
            return $this->db->lastInsertId();
        }
        return false;
    }



    // Desativar serviço 

    public function desativarServico($id)
    {

        $sql = "UPDATE tbl_servico SET status_servico = 'Inativo'    WHERE id_servico = :id_servico ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_servico', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
