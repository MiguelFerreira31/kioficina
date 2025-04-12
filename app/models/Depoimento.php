<?php



class Depoimento extends Model
{
    public function getTodosDepoimentos()
    {

        $sql = " SELECT nome_cliente, cidade_cliente, sigla_uf, descricao_depoimento, id_depoimento,nota_depoimento,datahora_depoimento, foto_cliente, alt_foto_cliente FROM tbl_depoimento d
        INNER JOIN tbl_cliente c ON d.id_cliente = c.id_cliente
        INNER JOIN tbl_estado e ON c.id_uf = e.id_uf
        WHERE status_depoimento = 'Aprovado'
        ORDER BY nota_depoimento DESC, nome_cliente ASC;";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDepoimentoPositivo()
    {
        $sql = "SELECT COUNT(id_depoimento) AS qtde_depoimento FROM tbl_depoimento WHERE nota_depoimento >= 4";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function addDepoimento($dados)
{
    $sql = "INSERT INTO tbl_depoimento (
        id_cliente, 
        descricao_depoimento, 
        nota_depoimento, 
        datahora_depoimento, 
        status_depoimento
    ) VALUES (
        :id_cliente, 
        :descricao_depoimento, 
        :nota_depoimento, 
        :datahora_depoimento, 
        :status_depoimento
    )";

    $stmt = $this->db->prepare($sql);

    // Ajustando os bindValue para corresponder às variáveis corretas
    $stmt->bindValue(':id_cliente', $dados['id_cliente']);
    $stmt->bindValue(':descricao_depoimento', $dados['descricao_depoimento']);
    $stmt->bindValue(':nota_depoimento', $dados['nota_depoimento']);
    $stmt->bindValue(':datahora_depoimento', $dados['datahora_depoimento']);
    $stmt->bindValue(':status_depoimento', "Aprovado");

    // Executando a consulta
    $stmt->execute();

    // Retornando o ID do último registro inserido
    return $this->db->lastInsertId();
}



}
