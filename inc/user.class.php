<?php

class user extends Kodesonen{
    protected function register(){
        if($_POST['navn'] !== '' AND $_POST['epost'] !== ''){
            $query = $this->sql->selectWithData("medlemmer", "epost", $_POST['epost']);
            if($query->rowCount() == 0){
                $query = $this->sql->pdo->prepare("
                    INSERT INTO medlemmer (navn, epost, studie, grad, regdato) 
                    VALUES (:navn, :epost, :studie, :grad, :regdato)");
                $query->execute(array(
                    ':navn' => $_POST['navn'], 
                    ':epost' => $_POST['epost'],
                    ':studie' => $_POST['retning'],
                    ':grad' => $_POST['grad'],
                    ':regdato' => $this->getDate(1)
                ));

                $this->labelText("SUCCESS", "Hurra", "Du er nå medlem av ".$this->name.". Velkommen skal du være!");
            }
            else $this->labelText("ERROR", "Oops", "Denne e-post adressen finnes allerede i systemet. Du er visst medlem fra før!");
        }
        else $this->labelText("ERROR", "Heyyy", "Husk å fylle ut alle tekstfeltene!");
    }

    protected function courseName(){
        $id = $_GET['id'];
        //$courseId = $this->sql->

        $query = $this->sql->selectWithData("kurskapitler", "id", $id);

        if($query->rowCount() != 0){
            $row = $query->fetch(PDO::FETCH_ASSOC);
            echo $row['tittel'];
        }
    }

    private function countChapters($id){
        $query = $this->sql->selectWithData("kurskapitler", "kursid", $id);
        return $query->rowCount();
    }

    protected function listChapters(){
        $query = $this->sql->pdo->prepare("SELECT * FROM kurskapitler WHERE kursid = :id GROUP BY kapittel");
        $query->execute(array(':id' => $_GET['id']));
        $total_chapters = $query->rowCount();

        for($i = 1; $i <= $total_chapters; $i++){
            $query = $this->sql->pdo->prepare("SELECT * FROM kurskapitler WHERE kursid = :id AND kapittel = $i");
            $query->execute(array(':id' => $_GET['id']));

            if($query->rowCount() != 0){
                echo "<div class='kurs_info'><h2>Kapittel $i:</h2></div>";

                while($row = $query->fetch(PDO::FETCH_ASSOC)){
                    echo "
                    <a href='/?side=les-innlegg&id=".$row['id']."&kurs=".$_GET['id']."' class='course_select'>
                        <div class='course_select_info'>
                            <h2>".$row['kapittel'].".".$row['delkapittel']." - ".$row['tittel']."</h2>
                        </div>

                        <div class='course_select_symbol'>
                            <h2><i class='fas fa-book-open'></i></h2>
                        </div>
                    </a>
                    ";
                }
            }
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
        else $this->labelText("ERROR", "Beklager", "Dette innlegget har ikke blitt publisert enda!");
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

        if($query->rowCount() != 0){
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
                        <div class='utfordringer_image_overlay'><i class='fas fa-search-plus'></i></div>
                    </div>

                    <div class='challenge-info'>
                        <div class='challenge-info-text'>
                            <h2>$tittel</h2><br/>
                            <p>$beskrivelse</p>
                        </div>

                        <div class='challenge-info-buttons'>
                            <br/><p><a href='/assets/pdf/$pdf' target='_blank' class='button'><i class='fas fa-file-pdf'></i> Last ned pdf</a></p> 
                            <p style='margin-top: 10px'> <a href='$git' target='_blank' class='hyperlink'><i class='fab fa-github-square'></i> GitHub</a></p>
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
        else $this->labelText("ERROR", "Hmmm", "Vi har ikke lagt ut noen utfordringer for øyeblikket. Kom tilbake senere!");
        
    }
    
    public function listAuthorPosts() {

        // Using CAST to limit the amount of characters fetched from ´innhold´ with a visual effect from CSS
        $query = $this->sql->pdo->query("SELECT kapid, kursid, forfatter, dato, CAST(innhold AS CHAR(1500)) AS kortinnhold, tittel 
                                        FROM kursinnlegg, kurskapitler 
                                        WHERE forfatter =". $_GET['id'] ." 
                                        AND kursinnlegg.kapid = kurskapitler.id ORDER BY dato");

        if($query->rowCount() != 0){
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $tittel = $row['tittel'];
                $innhold = $row['kortinnhold'];
                $kapid = $row['kapid'];
                $kursid = $row['kursid'];

                echo "
                        <div class='authorPost-section'><h1>$tittel</h1> <br/> <p>". strip_tags($innhold) ."</p>
                        <a href='/?side=les-innlegg&id=$kapid&kurs=$kursid'><div class='authorPost-button'>Les innlegg</div></a></div>
                    ";
            }
        }
        else $this->labelText("ERROR", "Oi!", "Vi finner ikke innleggene til brukeren");
    }

    public function listAuthorStats() {
        $query = $this->sql->pdo->query("SELECT innhold, forfatter
                                        FROM kursinnlegg, kurskapitler
                                        WHERE forfatter =". $_GET['id'] ."
                                        AND kursinnlegg.kapid = kurskapitler.id");

        $total_count = $query->rowCount();

        if($total_count > 10) {
            echo "<br/><p> Er en aktiv forfatter med $total_count publiserte innlegg. </p>";
        }
        elseif($total_count > 50) {
            echo "<br/><p><i class='fas fa-trophy'></i> Er en super aktiv forfatter med $total_count publiserte innlegg. </p>";
        }
        else {
            echo "<br/><p> Det finnes $total_count innlegg skrevet av brukeren. </p>";
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

    protected function getAuthorName(){
        $forfatter = $this->sql->grabData("kursinnlegg", "kapid", $_GET['id'], "forfatter");
        $this->requestSpecificData("medlemmer", "id", $forfatter, "navn");
    }

    protected function getPostedDate(){
        $this->requestSpecificData("kursinnlegg", "kapid", $_GET['id'], "dato");
    }

    protected function getNextPost(){
        // Counting total chapters
        $query = $this->sql->pdo->prepare("SELECT * FROM kurskapitler WHERE kursid = :kurs GROUP BY kapittel");
        $query->execute(array(':kurs' => $_GET['kurs']));
        $total_chapters = $query->rowCount();

        // Getting current chapter number
        $query = $this->sql->pdo->prepare("SELECT kapittel, delkapittel FROM kurskapitler WHERE id = :id");
        $query->execute(array(':id' => $_GET['id']));
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $current_chapter = $row['kapittel'];
        $current_subchapter = $row['delkapittel'];

        // Getting next sub-chapter number
        $query = $this->sql->pdo->prepare("SELECT * FROM kurskapitler WHERE kursid = :kurs AND kapittel = :kapittel AND delkapittel = :delkapittel");
        $query->execute(array(':kurs' => $_GET['kurs'], ':kapittel' => $current_chapter, ':delkapittel' => $current_subchapter+1));

        if($query->rowCount() != 0){
            $row = $query->fetch(PDO::FETCH_ASSOC);
            echo "
            <a href='/?side=les-innlegg&id=".$row['id']."&kurs=".$_GET['kurs']."'>
                <div class='course-navigation-select select-right'>
                    <i class='fas fa-long-arrow-alt-right'></i> 
                    <h3>".$row['kapittel'].".".$row['delkapittel']." - ".$row['tittel']."</h3>
                </div>
            </a>
            ";
        }
        else{
            // Getting next chapter number
            $query = $this->sql->pdo->prepare("SELECT * FROM kurskapitler WHERE kursid = :kurs AND kapittel = :kapittel AND delkapittel = 1");
            $query->execute(array(':kurs' => $_GET['kurs'], ':kapittel' => $current_chapter+1));
            
            if($query->rowCount() != 0){
                $row = $query->fetch(PDO::FETCH_ASSOC);
                echo "
                <a href='/?side=les-innlegg&id=".$row['id']."&kurs=".$_GET['kurs']."'>
                    <div class='course-navigation-select select-right'>
                        <i class='fas fa-long-arrow-alt-right'></i> 
                        <h3>".$row['kapittel'].".".$row['delkapittel']." - ".$row['tittel']."</h3>
                    </div>
                </a>
                ";
            }
        }
    }

    protected function getPrevPost(){
        // Counting total chapters
        $query = $this->sql->pdo->prepare("SELECT * FROM kurskapitler WHERE kursid = :kurs GROUP BY kapittel");
        $query->execute(array(':kurs' => $_GET['kurs']));
        $total_chapters = $query->rowCount();

        // Getting current chapter number
        $query = $this->sql->pdo->prepare("SELECT kapittel, delkapittel FROM kurskapitler WHERE id = :id");
        $query->execute(array(':id' => $_GET['id']));
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $current_chapter = $row['kapittel'];
        $current_subchapter = $row['delkapittel'];

        // Getting previous sub-chapter number
        $query = $this->sql->pdo->prepare("SELECT * FROM kurskapitler WHERE kursid = :kurs AND kapittel = :kapittel AND delkapittel = :delkapittel");
        $query->execute(array(':kurs' => $_GET['kurs'], ':kapittel' => $current_chapter, ':delkapittel' => $current_subchapter-1));

        if($query->rowCount() != 0){
            $row = $query->fetch(PDO::FETCH_ASSOC);
            echo "
            <a href='/?side=les-innlegg&id=".$row['id']."&kurs=".$_GET['kurs']."'>
                <div class='course-navigation-select select-left'>
                    <i class='fas fa-long-arrow-alt-left'></i> 
                    <h3>".$row['kapittel'].".".$row['delkapittel']." - ".$row['tittel']."</h3>
                </div>
            </a>
            ";
        }
    }

}

?>
