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
}

?>
