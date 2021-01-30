<?php
class Autolaskuri {
    private $vw_lkm;
    private $opel_lkm;
    private $toy_lkm;
    private $painike;


    public function laskeLkm() {
        
        if (isset($_POST['painike'])) {
            $this->painike = $_POST['painike'];
            if ($this->painike == "VW") {
                $this->vw_lkm = $this->vw_lkm + 1;
            }
            if ($this->painike == "Opel") {
                $this->opel_lkm = $this->opel_lkm + 1;
            }
            if ($this->painike == "Toyota") {
                $this->toy_lkm++;
            }
            if ($this->painike == "Nollaa") {
                $this->vw_lkm = 0;
                $this->opel_lkm = 0;
                $this->toy_lkm = 0;
            }
        }
        else {
            $this->vw_lkm = 0;
            $this->opel_lkm = 0;
            $this->toy_lkm = 0;
        }
    }

    public function naytaLomake() {
        $print = <<<EOform
          <form method="post" action="h4t1-autolaskuri-oop.php">
          <input type="submit" value="VW" name="painike">
          <input type="submit" value="Opel" name="painike">
          <input type="submit" value="Toyota" name="painike">
          <input type="submit" value="Nollaa" name="painike">
          </form>
EOform;
       echo $print;
   }

    public function naytaTulokset() {
        echo "<pre>\n";
        echo "Volkswagenit ... : $this->vw_lkm kpl.\n";
        echo "Opelit ......... : $this->opel_lkm kpl.\n";
        echo "Toyotat ........ : $this->toy_lkm kpl.\n";
        echo "</pre>\n";
     }

     
}