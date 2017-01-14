<?php

    class ChangeClaimsPaid{
        
        private $id;
        private $employeeId;
        private $claimPaidId;
        private $reservedAmount;
        private $paidAmount;
        private $ourShare;
        private $ttyShare;
        private $facShare;      
        private $date;

        public function getId(){
            return $this->id;
        }

        public function setEmployeeId($employeeId){
            $this->employeeId = $employeeId;
        }

        public function getEmployeeId(){
            return $this->employeeId;
        }

        public function setClaimPaidId($claimPaidId){
            $this->claimPaidId = $claimPaidId;
        }

        public function getClaimPaidId(){
            return $this->claimPaidId;
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
        
        public function setDate($date){
            $this->date = $date;
        }

        public function getDate(){
            return $this->date;
        }

        public function toString(){
            return "EmployeeId: ".$this->employeeId.
                    " ClaimOutstandingId: ".$this->claimOutstandingId.
                    " ReservedAmount: ".$this->reservedAmount.
                    " PaidAmount: ".$this->paidAmount.
                    " OurShare: ".$this->OurShare.
                    " TtyShare: ".$this->ttyShare.
                    " FacShare: ".$this->facShare.
                    " Date: ".$this->date."";
        }
    }
?>

