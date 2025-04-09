<?php
    // session_start();   
    class section{

        public function __construct(
            protected int $_id =1,
            protected string $_designation="Software",
            protected string $_description="Software development"
        ){}

        public function getId():int{
            return $this->_id;
        }
        public function getDesignation():string{
            return $this->_designation;
        }
        public function getDescription():string{
            return $this->_description;
        }
        public function setDesignation(string $name):void{
            $this->_designation=$name;
            echo"modification faite!";
        }
        public function setDescription(string $description):void{
            $this->_description=$description;
            echo"modification faite!";
        } 
    }
?>