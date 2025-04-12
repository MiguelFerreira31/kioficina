<?php

class Veiculo extends Model
{

    public function getVeiculoIdCliente($id)
    {

        $sql = "SELECT v.*,m.* FROM tbl_veiculo v INNER JOIN tbl_modelo m ON v.id_modelo = m.id_modelo WHERE v.id_cliente = :id_cliente ";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_cliente', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




    public function ServicoExecutadoPorCliente($id){

        
    }
}
