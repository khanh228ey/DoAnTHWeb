<?php
    class Nvgiaohang{
        private $manv;
        private $tennv;
        private $sdt;
        private $diachi;
        private $gioitinh;


	

        /**
         * Get the value of manv
         */
        public function getManv()
        {
                return $this->manv;
        }

        /**
         * Set the value of manv
         */
        public function setManv($manv): self
        {
                $this->manv = $manv;

                return $this;
        }

        /**
         * Get the value of tennv
         */ 
        public function getTennv()
        {
                return $this->tennv;
        }

        /**
         * Set the value of tennv
         *
         * @return  self
         */ 
        public function setTennv($tennv)
        {
                $this->tennv = $tennv;

                return $this;
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
         * Get the value of diachi
         */ 
        public function getDiachi()
        {
                return $this->diachi;
        }

        /**
         * Set the value of diachi
         *
         * @return  self
         */ 
        public function setDiachi($diachi)
        {
                $this->diachi = $diachi;

                return $this;
        }

        /**
         * Get the value of gioitinh
         */ 
        public function getGioitinh()
        {
                return $this->gioitinh;
        }

        /**
         * Set the value of gioitinh
         *
         * @return  self
         */ 
        public function setGioitinh($gioitinh)
        {
                $this->gioitinh = $gioitinh;

                return $this;
        }
    }
?>