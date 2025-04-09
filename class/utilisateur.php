<?php
    // session_start();   
    class utilisateur{

        public function __construct(
            protected int $_id =24,
            protected string $_username="ema",
            protected string $_password="",
            protected string $_email="ema@gmail.com",
            protected string $_role="admin",
        ){}

        public function getId():int{
            return $this->_id;
        }
        public function getUserName():string{
            return $this->_username;
        }
        public function getpassword():string{
            return $this->_password;
        }
        public function getEmail():string{
            return $this->_email;
        }
        public function getRole():string{
            return $this->_role;
        }
        public function setUserName(string $name):void{
            $this->_username=$name;
            echo"modification faite!";
        }
        public function setPassword(string $pass):void{
            $this->_password=$pass;
            echo"modification faite!";
        }
        public function setRole(string $Role):void{
            $this->_role=$Role;
            echo"modification faite!";
        }  
    }
?>