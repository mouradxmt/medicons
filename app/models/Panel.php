<?php
class Panel{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function medConsulterAll($forMedecin,$filter){
        $sql = "SELECT * ";
        $sql .="FROM patient,medecin,consultation,service ";
        $sql .="WHERE medecin.codeService = service.codeService ";
        $sql .="AND consultation.IP = patient.IP ";
        $sql .="AND consultation.codeMedecin = medecin.codeMedecin ";
        if($filter=="Attente"){
            $sql .="AND consultation.etatConsultation = 'Attente' ";
        }
        if($forMedecin=="only"){
            $sql .="AND medecin.codeMedecin = :codeMedecin ";
        }
        $sql .="ORDER BY consultation.numeroConsultation DESC  ";
        $this->db->query($sql);
        if($forMedecin=="only"){
            $user=[
                'id'    =>  $_SESSION['userId'],
                'type'  =>  $_SESSION['userType']
            ];
            $this->db->bind(':codeMedecin',($this->getPorMById($user)->codeMedecin));
        }
        $rows= $this->db->resultSet();
        return $rows;
    }
    public function getPorMById($user){
        // getPatientOrMedecinByUserId
        if ($user['type']=='patient'){
            $sql1 = 'SELECT * FROM patient WHERE userId = :userId';
        } elseif($user['type']='medecin'){
            $sql1 = 'SELECT * FROM medecin WHERE userId = :userId';
        }
            $this->db->query($sql1);
            $this->db->bind(':userId',$user['id']); 
        $row = $this->db->single();
        return $row;
    }
}