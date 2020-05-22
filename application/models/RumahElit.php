<?php

class RumahElit extends CI_Model{

    function semua(){
        $query = $this->db->query("SELECT * FROM perumahan_elit, tipe_perumahan_elit WHERE id_tipe = tipe_perumahan_elit.id");
        return $query->result();
    }

}
    
?>