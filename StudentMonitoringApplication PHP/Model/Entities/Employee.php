<?php

    class Employee{
        
        private $id;
        private $employeeId;
        private $name;
        private $email;
        private $phone;
        private $password;
        private $authority;

        public function getId(){
            return $this->id;
        }

        public function setEmployeeId($employeeId){
            $this->employeeId = $employeeId;
        }

        public function getEmployeeId(){
            return $this->employeeId;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getName(){
            return $this->name;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setPhone($phone){
            $this->phone = $phone;
        }

        public function getPhone(){
            return $this->phone;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setAuthority($authority){
            $this->authority = $authority;
        }

        public function getAuthority(){
            return $this->authority;
        }

        public function toString(){
            return "EmployeeId: ".$this->employeeId.
                    " Name: ".$this->name.
                    " Email: ".$this->email.
                    " Phone: ".$this->phone.
                    " Password: ".$this->password.
                    " Authority: ".$this->authority."";
        }
    }
?>

