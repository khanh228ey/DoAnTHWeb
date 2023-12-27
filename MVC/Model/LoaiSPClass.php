<?php 
    Class LoaiSP {
        private $maloaisp;
        private $tenloai;

        /**
         * Get the value of maloaisp
         */ 
        public function getMaloaisp()
        {
                return $this->maloaisp;
        }

        /**
         * Set the value of maloaisp
         *
         * @return  self
         */ 
        public function setMaloaisp($maloaisp)
        {
                $this->maloaisp = $maloaisp;

                return $this;
        }

        /**
         * Get the value of tenloai
         */ 
        public function getTenloai()
        {
                return $this->tenloai;
        }

        /**
         * Set the value of tenloai
         *
         * @return  self
         */ 
        public function setTenloai($tenloai)
        {
                $this->tenloai = $tenloai;

                return $this;
        }
    }
?>