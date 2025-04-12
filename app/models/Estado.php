<?php

class Estado extends Model{

    public function getListarEstados()
    {

        $sql = "SELECT * FROM tbl_estado ORDER BY sigla_uf ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



}