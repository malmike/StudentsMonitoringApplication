<?php

    class ChangeClaimsOutstanding{
        
        private $id;
        private $employeeId;
        private $claimOutstandingId;
        private $totalAmountOs;
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

        public function setClaimOutstandingId($claimOutstandingId){
            $this->claimOutstandingId = $claimOutstandingId;
        }

        public function getClaimOutstandingId(){
            return $this->claimOutstandingId;
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
        
        public function setDate($date){
            $this->date = $date;
        }

        public function getDate(){
            return $this->date;
        }

        public function toString(){
            return "EmployeeId: ".$this->employeeId.
                    " ClaimOutstandingId: ".$this->claimOutstandingId.
                    " TotalAmountOs: ".$this->totalAmountOs.
                    " OurShare: ".$this->OurShare.
                    " TtyShare: ".$this->ttyShare.
                    " FacShare: ".$this->facShare.
                    " Date: ".$this->date."";
        }
    }
?>

