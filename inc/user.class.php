<?php

class user extends Kodesonen{
    protected function register(){
        if($_POST['navn'] !== '' AND $_POST['epost'] !== ''){
            $navn = $_POST['navn'];
            $epost = $_POST['epost'];

            $query = $this->sql->selectWithData("medlemmer", "epost", $epost);
            if($query->rowCount() == 0){
                $query = $this->sql->pdo->prepare("INSERT INTO medlemmer (navn, epost) VALUES (:navn, :epost)");
                $query->execute(array(':navn' => $navn, ':epost' => $epost));
                $this->labelText("SUCCESS", "Hurra", "Du er nå medlem av ".$this->name.". Velkommen skal du være!");
                // send epost med verifisering
            }
            else $this->labelText("ERROR", "Oops", "Denne e-post adressen finnes allerede i systemet. Du er visst medlem fra før!");
        }
        else $this->labelText("ERROR", "Heyyy", "Husk å fylle ut alle tekstfeltene!");
    }

    private function countChapters($id){
        $query = $this->sql->selectWithData("kurskapitler", "kursid", $id);
        return $query->rowCount();
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
                <a href='/?side=les-innlegg&id=$chapterid' class='course_select'>
                    <div class='course_select_info'>
                        <h2>$del - $tittel</h2>
                    </div>

                    <div class='course_select_symbol'>
                        <h2><i class='fas fa-book-open'></i></h2>
                    </div>
                </a>
                ";
            }
        }
        else $this->labelText("ERROR", "Beklager", "Det finnes ingen kapitler innenfor dette kurset.");
    }

    protected function listCourses(){
        $query = $this->sql->selectNoData("kurskatalog");
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $id = $row['id'];
            $navn = $row['navn'];
            $beskrivelse = $row['beskrivelse'];
            $ikon = $row['ikon'];

            echo "
            <a href='/?side=kapitler&id=$id' class='box_thread'>
                <div class='box_symbol'>
                    <h1><i class='$ikon'></i></h1>
                </div>

                <div class='box_info'>
                    <h2>$navn</h2>
                    <h4>$beskrivelse</h4>
                </div>

                <div class='box_numbers'>
                    <h4><i class='fas fa-copy'></i> ".$this->countChapters($id)."</h4>
                </div>
            </a>
            ";
        }
    }

    protected function loadPostText(){
        $id = $_GET['id'];
        $query = $this->sql->selectWithData("kursinnlegg", "kapid", $id);
        if($query->rowCount() != 0){
            $row = $query->fetch(PDO::FETCH_ASSOC);
            if($row['publisert'] != 0){
                echo $row['innhold'];
            }
            else $this->labelText("ERROR", "Beklager", "Dette innlegget har ikke blitt publisert enda!"); 
        }
        else $this->labelText("ERROR", "Beklager", "Dette innlegget har ikke blitt skrevet enda!");
    }

    private function countDownloads($id){
        $query = $this->sql->selectWithData("utfordringer", "id", $id);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $count = $row['nedlastninger'] + 1;

        $query = $this->sql->pdo->prepare("UPDATE utfordringer SET nedlastninger = :count WHERE id = :id");
        $query->execute(array(':count' => $count, ':id' => $id));
    }

    protected function listChallenges(){
        $query = $this->sql->selectNoData("utfordringer");
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $id = $row['id'];
            $tittel = $row['tittel'];
            $beskrivelse = $row['beskrivelse'];
            $bilde = $row['bilde'];
            $pdf = $row['pdf'];
            $git = $row['git'];

            echo "
            <div class='challenge-box'>
                <div class='challenge-image'>
                    <center><img id='image-ufordringer-id' alt='Dette er en eksempel tekst!' src='assets/img/challenges/meetup-example.jpg'/></center>
                </div>

                <div class='challenge-info'>
                    <div class='challenge-info-text'>
                        <h2>$tittel</h2><br/>
                        <p>$beskrivelse</p>
                    </div>

                    <div class='challenge-info-buttons'>
                        <br/><p><a href='/assets/pdf/$pdf' target='_blank' class='button'><i class='fas fa-file-pdf'></i> Last ned pdf</a></p> 
                        <p style='margin-top: 10px'> | <a href='$git' target='_blank' class='hyperlink'><i class='fab fa-github-square'></i> GitHub</a></p>
                    </div>
                </div>
            </div>
			<div id='utfordringer-modal' class='image-utfordringer-modal'>
			  <span class='close'>&times;</span>
			  <img class='modal-content' id='utfordringer_image'>
			  <div id='caption'></div>
			</div>
            ";
        }
    }

    private function getStudy($navn){
        switch($navn){
            case 'DATAING': return "Dataingeniør"; break;
            case 'ELEKING': return "Elektroingeniør"; break;
            case 'MASKING': return "Maskiningeniør"; break;
            case 'LEKTOR': return "Lektorstudent"; break;
            default: return "Ukjent"; break;
        }
    }

    private function getDegree($navn){
        switch($navn){
            case 'BACH': return "Bachelor"; break;
            case 'MAST': return "Master"; break;
            case 'STAFF': return "Lærer"; break;
            default: return "Ukjent"; break;
        }
    }

    protected function getMemberList(){
        $query = $this->sql->selectNoData("medlemmer");
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $navn = $row['navn'];
            $studie = $row['studie'];
            $grad = $row['grad'];
            $regdato = $row['regdato'];
            $privat = $row['privat'];

            if($privat != true){
                echo "
                <tr>
                    <td>$navn</td>
                    <td>".$this->getStudy($studie)." (".$this->getDegree($grad).")</td>
                    <td>$regdato</td>
                </tr>
                ";
            }
        }
    }

    protected function privateUser(){
        if($_POST['epost'] !== ''){
            $epost = $_POST['epost'];
            $begrunnelse = $_POST['begrunnelse'];

            $query = $this->sql->selectWithData("medlemmer", "epost", $epost);
            if($query->rowCount() != 0){
                $row = $query->fetch(PDO::FETCH_ASSOC);
                $privat = $row['privat'];

                $query = $this->sql->pdo->prepare("UPDATE medlemmer SET privat = :num WHERE epost = :epost");
                $query->execute(array(':num' => !$privat, ':epost' => $epost));
                $this->labelText("SUCCESS", "Grattis", "Du har oppdatert synligheten på medlemskapet ditt!");
            }
            else $this->labelText("ERROR", "Hmmm", "Du er ikke medlem av Kodesonen!");
        }
        else $this->labelText("ERROR", "Heyyy", "Du er nødt til å skrive e-post adressen din!");
    }
}

?>
