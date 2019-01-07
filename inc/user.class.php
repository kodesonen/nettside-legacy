<?php

class user extends Kodesonen{
    protected function register(){
        if($_POST['navn'] !== '' AND $_POST['epost'] !== ''){
            $navn = $_POST['navn'];
            $epost = $_POST['epost'];

            $query = $this->sql->sqlSelect("medlemmer", "epost", $epost);
            if($query->rowCount() == 0){
                $query = $this->sql->pdo->prepare("INSERT INTO medlemmer (navn, epost) VALUES (:navn, :epost)");
                $query->execute(array(':navn' => $navn, ':epost' => $epost));
                echo "OK";
                // send epost med verifisering
            }
            else echo "Bruker finnes allerede.";
        }
        else echo "Fyll ut alle tekstfeltene.";
    }
}

?>
