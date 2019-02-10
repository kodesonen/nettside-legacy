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
                $del = $row['del'];
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
        if($_POST['navn'] !== '' AND $_POST['delnr'] !== ''){
            $navn = $_POST['navn'];
            $delnr = $_POST['delnr'];
            $id = $_GET['id'];

            $query = $this->sql->pdo->prepare("INSERT INTO kurskapitler (kursid, del, tittel) VALUES (:kursid, :del, :tittel)");
            $query->execute(array(':kursid' => $id, ':del' => $delnr, ':tittel' => $navn));
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
                <div class='course_select_info'>
                    <h2>$tittel</h2>
                </div>
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
}

?>
