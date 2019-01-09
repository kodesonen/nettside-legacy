<?php

class admin extends Kodesonen{
    private function countChapters($id){
        $query = $this->sql->selectWithData("kurskapitler", "kursid", $id);
        return $query->rowCount();
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
}

?>
