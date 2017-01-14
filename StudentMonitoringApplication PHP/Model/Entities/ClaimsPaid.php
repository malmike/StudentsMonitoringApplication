<?php

    class ClaimsPaid{
        
        private $id;
        private $sno;
        private $clientsName;
        private $claimNumber;
        private $reservedAmount;
        private $paidAmount;
        private $ourShare;
        private $ttyShare;
        private $facShare;
        private $dos;
        private $fno;
        private $claimClassesId;

        public function getId(){
            return $this->id;
        }

        public function setSno($sno){
            $this->sno = $sno;
        }

        public function getSno(){
            return $this->sno;
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

        public function setReservedAmount($reservedAmount){
            $this->reservedAmount = $reservedAmount;
        }

        public function getReservedAmount(){
            return $this->reservedAmount;
        }

        public function setPaidAmount($paidAmount){
            $this->paidAmount = $paidAmount;
        }

        public function getPaidAmount(){
            return $this->paidAmount;
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

        public function setDos($dos){
            $this->dos = $dos;
        }

        public function getDos(){
            return $this->dos;
        }

        public function setFno($fno){
            $this->fno = $fno;
        }

        public function getFno(){
            return $this->fno;
        }

        public function setClaimClassesId($claimClassesId){
            $this->claimClassesId = $claimClassesId;
        }

        public function getClaimClassesId(){
            return $this->claimClassesId;
        }

        public function toString(){
            return "SNo: ".$this->sno.
                    " ClientsName: ".$this->clientsName.
                    " ClaimNumber: ".$this->claimNumber.
                    " ReservedAmount: ".$this->reservedAmount.
                    " PaidAmount: ".$this->paidAmount.
                    " OurShare: ".$this->OurShare.
                    " TtyShare: ".$this->ttyShare.
                    " FacShare: ".$this->facShare.
                    " Dos: ".$this->dos.
                    " Fno: ".$this->fno.
                    " ClaimClassesId: ".$this->claimClassesId."";
        }
    }
?>

