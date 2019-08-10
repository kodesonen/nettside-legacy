<?php

class admin extends Kodesonen{
    private function countChapters($id){
        $query = $this->sql->selectWithData("kurskapitler", "kursid", $id);
        return $query->rowCount();
    }

    protected function chapterName(){
        $id = $_GET['id'];
        $query = $this->sql->selectWithData("kurskapitler", "id", $id);
        if($query->rowCount() != 0){
            $row = $query->fetch(PDO::FETCH_ASSOC);
            echo $row['tittel'];
        }
    }

    protected function listCourses(){
        $query = $this->sql->selectNoData("kurskatalog");
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $id = $row['id'];
            $navn = $row['navn'];
            $beskrivelse = $row['beskrivelse'];
            $ikon = $row['ikon'];

            echo "
            <a href='/?side=kapittelbehandler&id=$id' class='course_select'>
                <div class='course_select_info'>
                    <h2><i class='$ikon' style='padding-right: 6px;'></i> $navn</h2>
                </div>

                <div class='course_select_symbol'>
                    <h2><i class='fas fa-copy'></i> ".$this->countChapters($id)."</h2>
                </div>
            </a>
            ";
        }
    }

    protected function listChapters(){
        $id = $_GET['id'];
        $query = $this->sql->selectWithData("kurskapitler", "kursid", $id);

        if($query->rowCount() != 0){
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $chapterid = $row['id'];
                $del = $row['delkapittel'];
                $tittel = $row['tittel'];

                echo "
                <a href='/?side=skriv-innlegg&id=$chapterid' class='course_select'>
                    <div class='course_select_info'>
                        <h2>$del - $tittel</h2>
                    </div>

                    <div class='course_select_symbol'>
                        <h2><i class='fas fa-edit'></i></h2>
                    </div>
                </a>
                ";
            }
        }
        else $this->labelText("ERROR", "Oiii", "Det finnes ingen kapitler innenfor dette kurset.");
    }

    protected function createCourse(){
        if($_POST['navn'] !== '' AND $_POST['beskrivelse'] !== '' AND $_POST['ikon'] !== ''){
            $navn = $_POST['navn'];
            $beskrivelse = $_POST['beskrivelse'];
            $ikon = $_POST['ikon'];

            $query = $this->sql->pdo->prepare("INSERT INTO kurskatalog (navn, beskrivelse, ikon) VALUES (:navn, :beskrivelse, :ikon)");
            $query->execute(array(':navn' => $navn, ':beskrivelse' => $beskrivelse, ':ikon' => $ikon));
            $this->labelText("SUCCESS", "Hurra", "Du har opprettet et nytt kurs.");
        }
        else $this->labelText("ERROR", "Heyyy", "Husk å fylle ut alle tekstfeltene!");
    }

    protected function editCourse(){
        echo "baba";
    }

    protected function createChapter(){

        if($_POST['navn'] !== '' AND $_POST['kapittel'] !== '' AND $_POST['delnr'] !== ''){
            if($_POST['delnr'] !== '0'){
                $query = $this->sql->pdo->prepare("
                    INSERT INTO kurskapitler (kursid, kapittel, delkapittel, tittel) 
                    VALUES (:kursid, :kapittel, :delkapittel, :tittel)
                ");
                $query->execute(array(
                    ':kursid' => $_GET['id'], 
                    ':kapittel' => $_POST['kapittel'], 
                    ':delkapittel' => $_POST['delnr'], 
                    ':tittel' => $_POST['navn']
                ));
                $this->labelText("SUCCESS", "Hurra", "Du har opprettet et nytt kapittel.");
            }
            else $this->labelText("ERROR", "Oops", "Alle delkapitler må starte fra 1.");

        if($_POST['navn'] !== '' AND $_POST['delnr'] !== ''){
            $navn = $_POST['navn'];
            $delnr = $_POST['delnr'];
            $id = $_GET['id'];

            $query = $this->sql->pdo->prepare("INSERT INTO kurskapitler (kursid, delkapittel, tittel) VALUES (:kursid, :delkapittel, :tittel)");
            $query->execute(array(':kursid' => $id, ':delkapittel' => $delnr, ':tittel' => $navn));
            $this->labelText("SUCCESS", "Hurra", "Du har opprettet et nytt kapittel.");
        }
        else $this->labelText("ERROR", "Heyyy", "Husk å fylle ut alle tekstfeltene!");
    }

    protected function loadPostText(){
        $id = $_GET['id'];
        $query = $this->sql->selectWithData("kursinnlegg", "kapid", $id);
        if($query->rowCount() != 0){
            $row = $query->fetch(PDO::FETCH_ASSOC);
            echo $row['innhold'];
        }
    }

    private function doesPostExist(){
        $id = $_GET['id'];
        $query = $this->sql->selectWithData("kursinnlegg", "kapid", $id);
        if($query->rowCount() != 0) return true;
        else return false;
    }

    protected function createNewPost($type){
        if($_POST['navn'] !== ''){
            $navn = $_POST['navn'];
            $tekst = nl2br($_POST['tekst']);
            $id = $_GET['id'];

            $query = $this->sql->pdo->prepare("UPDATE kurskapitler SET tittel = :tittel WHERE id = :id");
            $query->execute(array(':tittel' => $navn, ':id' => $id));

            switch($type){
                case 'save':{
                    if($this->doesPostExist()){
                        $query = $this->sql->pdo->prepare("UPDATE kursinnlegg SET innhold = :innhold, publisert = :publisert WHERE kapid = :id");
                        $query->execute(array(':innhold' => $tekst, ':publisert' => 0, ':id' => $id));
                    }
                    else{
                        $query = $this->sql->pdo->prepare("INSERT INTO kursinnlegg (kapid, publisert, innhold) VALUES (:kapid, :publisert, :innhold)");
                        $query->execute(array(':kapid' => $id, ':publisert' => 0, ':innhold' => $tekst));
                    }
                    $this->labelText("SUCCESS", "Supert", "Du har lagret dette innlegget.");
                } break;

                case 'publish':{
                    if($this->doesPostExist()){
                        $query = $this->sql->pdo->prepare("UPDATE kursinnlegg SET innhold = :innhold, publisert = :publisert WHERE kapid = :id");
                        $query->execute(array(':innhold' => $tekst, ':publisert' => 1, ':id' => $id));
                    }
                    else{
                        $query = $this->sql->pdo->prepare("INSERT INTO kursinnlegg (kapid, publisert, innhold) VALUES (:kapid, :publisert, :innhold)");
                        $query->execute(array(':kapid' => $id, ':publisert' => 1, ':innhold' => $tekst));
                    }
                    $this->labelText("SUCCESS", "Nice", "Du har publisert dette innlegget.");
                } break;
            }
        }
        else $this->labelText("ERROR", "Heyyy", "Husk å fylle ut alle tekstfeltene!");
    }

    protected function listChallenges(){
        $query = $this->sql->selectNoData("utfordringer");
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $id = $row['id'];
            $tittel = $row['tittel'];
            $nedlastinger = $row['nedlastinger'];

            echo "
            <a href='/?side=endre-utfordring&id=$id' class='course_select'>
                <div class='course_select_info'><h2>$tittel</h2></div>
            </a>
            ";
        }
    }

    protected function createChallenge(){
        if($_POST['tittel'] !== '' AND $_POST['beskrivelse'] !== '' AND $_POST['kildekode'] !== ''){
            $tittel = $_POST['tittel'];
            $beskrivelse = $_POST['beskrivelse'];
            $kildekode = $_POST['kildekode'];

            $opg_navn = $_FILES['oppgave']['name'];
            $opg_tmp = $_FILES['oppgave']['tmp_name'];
            $opg_type = $_FILES['oppgave']['type'];
            $tmp = explode('.', $opg_navn);
            $opg_ext = strtolower(end($tmp));

            $img_navn = $_FILES['bilde']['name'];
            $img_tmp = $_FILES['bilde']['tmp_name'];
            $img_type = $_FILES['bilde']['type'];
            $tmp = explode('.', $img_navn);
            $img_ext = strtolower(end($tmp));
            
            $opg_formats = array("pdf");
            $img_formats = array("jpeg", "jpg", "png");
            if(in_array($opg_ext, $opg_formats)){
                if(in_array($img_ext, $img_formats)){
                    move_uploaded_file($opg_tmp, "assets/pdf/".strtolower($opg_navn));
                    move_uploaded_file($img_tmp, "assets/img/uploads/".strtolower($img_navn));
                }
                else $this->labelText("ERROR", "Oops", "Bildet må enten være JPEG eller PNG format.");
            }
            else $this->labelText("ERROR", "Oops", "Oppgaven må være i PDF format.");

            $query = $this->sql->pdo->prepare("
                INSERT INTO utfordringer (tittel, beskrivelse, git, bilde, pdf) 
                VALUES (:tittel, :beskrivelse, :git, :bilde, :pdf)");
            $query->execute(array(
                ':tittel' => $tittel, 
                ':beskrivelse' => $beskrivelse, 
                ':git' => $kildekode, 
                ':bilde' => strtolower($img_navn), 
                ':pdf' => strtolower($opg_navn)
            ));
            $this->labelText("SUCCESS", "Hurra", "Du har opprettet en ny utfordring.");
        }
        else $this->labelText("ERROR", "Hei du", "Husk å fylle ut alle tekstfeltene!");
    }

    protected function editChallenge(){
        if($_POST['tittel'] !== '' AND $_POST['beskrivelse'] !== '' AND $_POST['kildekode'] !== ''){
            $tittel = $_POST['tittel'];
            $beskrivelse = $_POST['beskrivelse'];
            $kildekode = $_POST['kildekode'];

            $query = $this->sql->pdo->prepare("
                UPDATE utfordringer 
                SET tittel = :tittel, beskrivelse = :beskrivelse, git = :git WHERE id = :id");
            $query->execute(array(
                ':tittel' => $tittel, 
                ':beskrivelse' => $beskrivelse, 
                ':git' => $kildekode, 
                ':id' => $_GET['id']));
            $this->labelText("SUCCESS", "Hurra", "Du har oppdatert en utfordring.");
        }
        else $this->labelText("ERROR", "Hei du", "Husk å fylle ut alle tekstfeltene!");
    }

    protected function delChallenge(){
        $query = $this->sql->pdo->prepare("DELETE FROM utfordringer WHERE id = :id");
        $query->execute(array(':id' => $_GET['id']));
        header("Location: /?side=endre-utfordringer");
    }

    protected function adminLogin(){
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password = hash('whirlpool', $password);
            $password = strtoupper($password);

            $query = $this->sql->selectWithData("medlemmer", "epost", $email);
            if($query->rowCount() == 1){
                if($this->verifyPassword($email, $password)){
                    $row = $query->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['UID'] = $row['id'];
                    header("Location: /?side=admin");
                }
                else $this->labelText("ERROR", "Oops", "Passordet ditt stemmer ikke!");
            }
            else $this->labelText("ERROR", "Oops", "Kontoen din finnes ikke!");
        }
    }

    private function verifyPassword($email, $password){
        $query = $this->sql->pdo->prepare("SELECT id FROM medlemmer WHERE epost = :epost AND passord = :passord");
        $query->execute(array(':epost' => $email, ':passord' => $password));
        if($query->rowCount() == 1) return true;
        else return false;
    }

    private function validAPIKey($key){
        switch($key){
            case 0: return "N/A"; break;
            default: return $key; break;
        }
    }

    private function adminRole($role){
        switch($role){
            case 0: return "Ingen"; break;
            case 1: return "Forfatter"; break;
            case 2: return "Administrator"; break;
            default: return "Ukjent"; break;
        }
    }

    private function privateMember($state){
        switch($state){
            case 0: return "Nei"; break;
            case 1: return "Ja"; break;
            default: return "Ukjent"; break;
        }
    }

    protected function listAllAdmins(){
        $query = $this->sql->pdo->prepare("SELECT * FROM medlemmer WHERE admin > 0");
        $query->execute();

        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            echo "
            <tr>
                <td>".$row['navn']."</td>
                <td>".$row['epost']."</td>
                <td>".$this->adminRole($row['admin'])."</td>
                <td>".$this->getStudy($row['studie'])." (".$this->getDegree($row['grad']).")</td>
                <td>".$row['regdato']."</td>
                <td>".$this->validAPIKey($row['apikey'])."</td>
            </tr>
            ";
        }
    }

    protected function listAllMembers(){
        $query = $this->sql->pdo->prepare("SELECT * FROM medlemmer WHERE admin = 0");
        $query->execute();

        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            echo "
            <tr>
                <td>".$row['navn']."</td>
                <td>".$row['epost']."</td>
                <td>".$this->getStudy($row['studie'])." (".$this->getDegree($row['grad']).")</td>
                <td>".$row['regdato']."</td>
                <td>".$this->privateMember($row['privat'])."</td>
                <td>".$this->validAPIKey($row['apikey'])."</td>
            </tr>
            ";
        }
    }

    protected function findUser(){
        if(isset($_POST['epost'])){
            $query = $this->sql->pdo->prepare("SELECT id FROM medlemmer WHERE epost = :epost");
            $query->execute(array(':epost' => $_POST['epost']));
            if($query->rowCount() != 0){
                $row = $query->fetch(PDO::FETCH_ASSOC);
                header("Location: /?side=endre-bruker&id=".$row['id']."");
            }
            else $this->labelText("ERROR", "Oops", "Denne brukeren finnes ikke!");
        }
        else $this->labelText("ERROR", "Hei du", "Husk å fylle ut alle tekstfeltene!");
    }

    protected function editUser(){
        if($_POST['tittel'] !== '' AND $_POST['beskrivelse'] !== '' AND $_POST['kildekode'] !== ''){
            $tittel = $_POST['tittel'];
            $beskrivelse = $_POST['beskrivelse'];
            $kildekode = $_POST['kildekode'];

            $query = $this->sql->pdo->prepare("
                UPDATE utfordringer 
                SET tittel = :tittel, beskrivelse = :beskrivelse, git = :git WHERE id = :id");
            $query->execute(array(
                ':tittel' => $tittel, 
                ':beskrivelse' => $beskrivelse, 
                ':git' => $kildekode, 
                ':id' => $_GET['id']));
            $this->labelText("SUCCESS", "Hurra", "Du har oppdatert en utfordring.");
        }
        else $this->labelText("ERROR", "Hei du", "Husk å fylle ut alle tekstfeltene!");
    }
}

?>
