<?php

class Marca extends Model
{    
    public function getTodasMarcas()
    {

        $sql = "SELECT * FROM tbl_marca ORDER BY nome_marca ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }  
      
}
