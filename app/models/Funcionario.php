<?php

class Funcionario extends Model
{

    public function buscarFunc($email)
    {
        $sql = "SELECT * FROM tbl_funcionario WHERE email_funcionario = :email AND status_funcionario = 'Ativo'";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function getListarFuncionario()
    {



        $sql = "SELECT a.*, e.sigla_uf 
    FROM tbl_funcionario AS a
    INNER JOIN tbl_estado AS e 
    ON a.id_uf = e.id_uf
    ORDER BY a.nome_funcionario ASC;";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addFuncionario($dados)
    {
        $sql = "INSERT INTO tbl_funcionario (
                nome_funcionario, 
                cpf_cnpj_funcionario, 
                email_funcionario, 
                data_adm_funcionario, 
                telefone_funcionario, 
                endereco_funcionario, 
                bairro_funcionario, 
                cargo_funcionario, 
                id_especialidade, 
                salario_funcionario, 
                status_funcionario, 
                id_uf
            ) VALUES (
                :nome_funcionario, 
                :cpf_cnpj_funcionario, 
                :email_funcionario, 
                :data_adm_funcionario, 
                :telefone_funcionario, 
                :endereco_funcionario, 
                :bairro_funcionario, 
                :cargo_funcionario, 
                :id_especialidade, 
                :salario_funcionario, 
                :status_funcionario, 
                :id_uf
            )";
    
        $stmt = $this->db->prepare($sql);
    
        $stmt->bindValue(':nome_funcionario', $dados['nome_funcionario']);
        $stmt->bindValue(':cpf_cnpj_funcionario', $dados['cpf_cnpj_funcionario']);
        $stmt->bindValue(':email_funcionario', $dados['email_funcionario']);
        $stmt->bindValue(':data_adm_funcionario', $dados['data_adm_funcionario']);
        $stmt->bindValue(':telefone_funcionario', $dados['telefone_funcionario']);
        $stmt->bindValue(':endereco_funcionario', $dados['endereco_funcionario']);
        $stmt->bindValue(':bairro_funcionario', $dados['bairro_funcionario']);
        $stmt->bindValue(':cargo_funcionario', $dados['cargo_funcionario']);
        $stmt->bindValue(':id_especialidade', $dados['id_especialidade']);
        $stmt->bindValue(':salario_funcionario', $dados['salario_funcionario']);
        $stmt->bindValue(':status_funcionario', $dados['status_funcionario']);
        $stmt->bindValue(':id_uf', $dados['id_uf']);
    
        $stmt->execute();
        return $this->db->lastInsertId();
    }
    

    public function getFuncionarioById($id)
    {

        $sql = "SELECT * FROM tbl_funcionario
                WHERE id_funcionario = :id_funcionario;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_funcionario', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }




    public function addFotofuncionario($id_funcionario, $arquivo, $nome_funcionario)
    {
        $sql = "UPDATE tbl_funcionario 
       SET foto_funcionario = :foto_funcionario, alt_foto_funcionario = :alt_foto_funcionario 
       WHERE id_funcionario = :id_funcionario";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':foto_funcionario', $arquivo);
        $stmt->bindValue(':alt_foto_funcionario', $nome_funcionario);
        $stmt->bindValue(':id_funcionario', $id_funcionario);

        return $stmt->execute();
    }
}
