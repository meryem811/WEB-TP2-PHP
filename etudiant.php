<?php 
class  etudiant  {
    private $nom;
    private $notes;

    public function __construct($nom, $notes) {
        $this->nom = $nom;
        $this->notes = $notes;     
    }

    public function affichenotes() {
        echo "<p><strong>Notes de {$this->nom} :</strong></p><ul>";
        foreach ($this->notes as $note) {
            $color=($note>10) ? "green" : (($note==10) ? "orange": "red");
            echo "<li style='color: $color;'>$note</li>";
        }
        echo "</ul>";
    }
    public function calculmoy(){
        if (count($this->notes)==0) return 0;
        return array_sum($this->notes)/count($this->notes);
}
public function estadmis(){
    return ($this->calculmoy()>=10 ? "✅Admis" :"❌non admis");
}
public function afficheres(){
    echo "<h2>{$this->nom}</h2>";
    $this->affichenotes();
    echo "<p><strong>Moyenne : </strong>" .number_format($this->calculmoy(),2) . "</p>";
    echo "<p><strong>resultat : </strong>" . $this->estadmis() . "</p>";
}
}
?>