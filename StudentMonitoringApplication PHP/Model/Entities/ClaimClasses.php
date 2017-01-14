<?php

    class ClaimClasses{
        
        private $id;
        private $classIndex;
        private $name;

        public function getId(){
            return $this->id;
        }

        public function setClassIndex($classIndex){
            $this->classIndex = $classIndex;
        }

        public function getClassIndex(){
            return $this->classIndex;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getName(){
            return $this->name;
        }

        public function toString(){
            return "ClassIndex: ".$this->classIndex.
                    " Name: ".$this->name."";
        }
    }
?>

