<?php 
class sessionmanager{
    public function start(){
        if (session_status() == PHP_SESSION_NONE){
            session_start();
        }
        if (!isset($_SESSION['nbvisit'])){
            $_SESSION['nbvisit'] = 0;
        }
    }

    public function incrementvisitcount(){
        $_SESSION['nbvisit'] ++;
    }
    public function reset (){
        $_SESSION['nbvisit'] = 1; 
        //session_unset();
        //session_destroy();
    }
    public function firstvisit(){
        return $_SESSION['nbvisit'] == 1;}
    public function message() {
        if ($this->firstvisit()){
            return "Bienvenue a notre plateforme !";
        }else {
            return "merci pour votre fidelité, c'est votre" .$_SESSION['nbvisit']." eme visite.";
        }
    }
}
?>