<?php
    // session_start();   
    class utilisateur{

        public function __construct(
            protected int $_id =24,
            protected string $_Name="ema",
            protected string $_Birthday="",
            protected string $_image="images/aya.jpg",
            protected int $_sectionId=1,
        ){}

        public function getId():int{
            return $this->_id;
        }
        public function getName():string{
            return $this->_Name;
        }
        public function getBirthday():string{
            return $this->_password;
        }
        public function getImage():string{
            return $this->_Image;
        }
        public function getSectionId():int{
            return $this->_sectionId;
        }
        public function getSection():string{
            //TODO: get the section name from the database using the sectionId
            return "Software";
        }
        
        public function setName(string $name):void{
            $this->_Name=$name;
            echo"modification faite!";
        }
        public function setImage(string $ImagePath):void{
            $this->_ImagePath=$ImagePath;
            echo"modification faite!";
        }
        public function setSection(int $Section):void{
            $this->_sectionId=$Section;
            echo"modification faite!";
        }  
    }
?>