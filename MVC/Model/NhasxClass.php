<?php
class Nhasx{
        private $manhasx;
        private $tennhasx;
        private $sdt;

        public function __construct(){

        }
        

        /**
         * Get the value of sdt
         */ 
        public function getSdt()
        {
                return $this->sdt;
        }

        /**
         * Set the value of sdt
         *
         * @return  self
         */ 
        public function setSdt($sdt)
        {
                $this->sdt = $sdt;

                return $this;
        }

        /**
         * Get the value of tennhasx
         */ 
        public function getTennhasx()
        {
                return $this->tennhasx;
        }

        /**
         * Set the value of tennhasx
         *
         * @return  self
         */ 
        public function setTennhasx($tennhasx)
        {
                $this->tennhasx = $tennhasx;

                return $this;
        }

        /**
         * Get the value of manhasx
         */ 
        public function getManhasx()
        {
                return $this->manhasx;
        }

        /**
         * Set the value of manhasx
         *
         * @return  self
         */ 
        public function setManhasx($manhasx)
        {
                $this->manhasx = $manhasx;

                return $this;
        }
    }
?>