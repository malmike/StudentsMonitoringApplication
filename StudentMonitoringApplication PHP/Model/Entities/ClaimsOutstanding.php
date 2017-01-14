<?php

    class ClaimsOutstanding{
        
        private $id;
        private $clientsName;
        private $claimNumber;
        private $uYear;
        private $totalAmountOs;
        private $ourShare;
        private $ttyShare;
        private $facShare;      
        private $claimClassesId;
        private $date;

        public function getId(){
            return $this->id;
        }

        public function setClientsName($clientsName){
            $this->clientsName = $clientsName;
        }

        public function getClientsName(){
            return $this->clientsName;
        }

        public function setClaimNumber($claimNumber){
            $this->claimNumber = $claimNumber;
        }

        public function getClaimNumber(){
            return $this->claimNumber;
        }

        public function setUYear($uYear){
            $this->uYear = $uYear;
        }

        public function getUYear(){
            return $this->uYear;
        }

        public function setTotalAmountOs($totalAmountOs){
            $this->totalAmountOs = $totalAmountOs;
        }

        public function getTotalAmountOs(){
            return $this->totalAmountOs;
        }

        public function setOurShare($ourShare){
            $this->ourShare = $ourShare;
        }

        public function getOurShare(){
            return $this->ourShare;
        }

        public function setTtyShare($ttyShare){
            $this->ttyShare = $ttyShare;
        }

        public function getTtyShare(){
            return $this->ttyShare;
        }

        public function setFacShare($facShare){
            $this->facShare = $facShare;
        }

        public function getFacShare(){
            return $this->facShare;
        }
        
        public function setClaimClassesId($claimClassesId){
            $this->claimClassesId = $claimClassesId;
        }

        public function getClaimClassesId(){
            return $this->claimClassesId;
        }
        
        public function setDate($date){
            $this->date = $date;
        }

        public function getDate(){
            return $this->date;
        }

        public function toString(){
            return "ClientsName: ".$this->clientsName.
                    " ClaimNumber: ".$this->claimNumber.
                    " UYear: ".$this->uYear.
                    " TotalAmountOs: ".$this->totalAmountOs.
                    " OurShare: ".$this->OurShare.
                    " TtyShare: ".$this->ttyShare.
                    " FacShare: ".$this->facShare.       
                    " ClaimClassesId: ".$this->claimClassesId.
                    " Date: ".$this->date."";
        }
    }
?>

