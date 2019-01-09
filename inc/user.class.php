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

    protected function listCourses(){
        $query = $this->sql->selectNoData("kurskatalog");
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $id = $row['id'];
            $navn = $row['navn'];
            $beskrivelse = $row['beskrivelse'];
            $ikon = $row['ikon'];

            echo "
            <a href='#' class='box_thread'>
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
}

?>
