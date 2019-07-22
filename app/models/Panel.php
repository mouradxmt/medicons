<?php
class Panel{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function medConsulterAll($forMedecin,$filter){
        $user=[
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
             ];
        $codePorM=$this->getPorMById($user)->codeMedecin;
        $sql = "SELECT * ";
        $sql .="FROM patient,medecin,consultation,service ";
        $sql .="WHERE medecin.codeService = service.codeService ";
        $sql .="AND consultation.IP = patient.IP ";
        $sql .="AND consultation.codeMedecin = medecin.codeMedecin ";
        if($filter=="Attente"){
            $sql .="AND consultation.etatConsultation = 'Attente' ";
        }elseif($filter=="Confirme"){
            $sql .="AND consultation.etatConsultation = 'Confirme' ";
        }
        if($forMedecin=="only"){
            $sql .="AND medecin.codeMedecin = :codeMedecin ";
        }
        $sql .="ORDER BY consultation.numeroConsultation DESC  ";
        $this->db->query($sql);
        if($forMedecin=="only"){
            $this->db->bind(':codeMedecin',$codePorM);
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
        $row->type=$user['type'];
        $row->email = $user['email'];
        $row->state = $user['state'];

        return $row;
    }
    public function medConsulter($id){
        $sql = "SELECT * ";
        $sql .="FROM patient,medecin,consultation,service ";
        $sql .="WHERE medecin.codeService = service.codeService ";
        $sql .="AND consultation.IP = patient.IP ";
        $sql .="AND consultation.codeMedecin = medecin.codeMedecin ";
        $sql .="AND consultation.numeroConsultation = :id ";
        $this->db->query($sql);
        $this->db->bind(':id',$id);
        $row = $this->db->single();
        return $row;
    }
    public function updateConsultation($data){

        $sql ='UPDATE consultation ';
        $sql .='SET etatConsultation = :etatConsultation, dateConsultation= :dateConsultation, journalCliniqueConsultation = :journalClinique ';
        $sql .='WHERE numeroConsultation= :numeroConsultation ';
        $this->db->query($sql);
        $this->db->bind(':numeroConsultation',$data['numeroConsutlation']);
        $this->db->bind(':etatConsultation',$data['etatConsultation']);
        $this->db->bind(':dateConsultation',$data['dateConsultation']);
        $this->db->bind(':journalClinique',$data['journalClinique']);
        $answer= $this->db->execute();
        return $answer;
    }
    public function deleteCons($id){
        $sql ='DELETE FROM consultation ';
        $sql .='WHERE numeroConsultation= :numeroConsultation ';
        $this->db->query($sql);
        $this->db->bind(':numeroConsultation',$id);
        $answer= $this->db->execute();
        return $answer;
    }
    public function listeMedecins(){
        $sql = "SELECT * ";
        $sql .= "FROM medecin,service ";
        $sql .= "WHERE medecin.codeService = service.codeService ";
        $sql .= "GROUP BY medecin.codeMedecin ";
        $this->db->query($sql);
        $answer = $this->db->resultSet();
        return $answer;

    }
    public function askConsult($data){
        $sql="INSERT INTO consultation (dateConsultation,etatConsultation,IP,journalCliniqueConsultation,codeMedecin) VALUES (:dateConsultation,'Attente',:IP,'En attente...',:codeMedecin) ";
        $this->db->query($sql);
        $this->db->bind(':IP',$data['IP']);
        $this->db->bind(':codeMedecin',$data['codeMedecin']);
        $this->db->bind(':dateConsultation',$data['dateConsultation']);
        $answer= $this->db->execute();
        return $answer;
    }
    public function mesConsultations($etat){
        $user=[
            'id'    =>  $_SESSION['userId'],
            'type'  =>  $_SESSION['userType'],
            'email' => $_SESSION['userMail'],
            'state' => $_SESSION['userState']
             ];
        $codePorM=$this->getPorMById($user)->IP;
        $sql = "SELECT * ";
        $sql .="FROM patient,medecin,consultation,service ";
        $sql .="WHERE medecin.codeService = service.codeService ";
        $sql .="AND consultation.IP = patient.IP ";
        $sql .="AND consultation.codeMedecin = medecin.codeMedecin ";
        if($etat=="Attente"){
            $sql .="AND consultation.etatConsultation = 'Attente' ";
        }elseif($etat=="Confirme"){
            $sql .="AND consultation.etatConsultation = 'Confirme' ";
        }
        $sql .="AND consultation.IP = :IP ";
        $sql .="ORDER BY consultation.numeroConsultation DESC  ";
        $this->db->query($sql);
        $this->db->bind(':IP',$codePorM);
        $rows= $this->db->resultSet();
        return $rows;
    }
    public function createProfile($data)
    {
        if ($_SESSION['userType'] == 'patient') {
            $sql = "INSERT INTO patient (nomPatient,prenomPatient,adressePatient,sexePatient,dateNaissancePatient,userId) ";
            $sql .= "VALUES (:nom,:prenom,:adresse,:sexe,:dateNaissance,:userId) ";
        } elseif ($_SESSION['userType'] == 'medecin') {
            $sql = "INSERT INTO medecin (nomMedecin,prenomMedecin,adresseMedecin,sexeMedecin,dateNaissanceMedecin,codeService,userId) ";
            $sql .= "VALUES (:nom,:prenom,:adresse,:sexe,:dateNaissance,:codeService,:userId) ";
        }
        $this->db->query($sql);
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':sexe', $data['sexe']);
        $this->db->bind(':dateNaissance', $data['dateNaissance']);
        $this->db->bind(':adresse', $data['adresse']);
        $this->db->bind(':userId', $_SESSION['userId']);
        if ($_SESSION['userType'] == 'medecin')
            $this->db->bind(':codeService', $data['codeService']);
        $answer = $this->db->execute();
         $this->db->query("UPDATE users SET state = 'complet' WHERE id=".$_SESSION['userId']);
         $updateState =$this->db->execute();
        $_SESSION['userState']='complet';
        return $answer && $updateState;
    }
    public function listeServices(){
    $sql = 'SELECT * FROM service';
    $this->db->query($sql);
    return $this->db->resultSet();
    }
}