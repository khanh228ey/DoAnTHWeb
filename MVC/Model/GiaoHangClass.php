<?php
    class GiaoHang{
        private $magiao;
        private $madh;
        private $manv;
        Private $ngaygiao;
        private $tinhtrang;

        /**
         * Get the value of magiao
         */
        public function getMagiao()
        {
                return $this->magiao;
        }

        /**
         * Set the value of magiao
         */
        public function setMagiao($magiao): self
        {
                $this->magiao = $magiao;

                return $this;
        }

        /**
         * Get the value of madh
         */
        public function getMadh()
        {
                return $this->madh;
        }

        /**
         * Set the value of madh
         */
        public function setMadh($madh): self
        {
                $this->madh = $madh;

                return $this;
        }

        /**
         * Get the value of manv
         */ 
        public function getManv()
        {
                return $this->manv;
        }

        /**
         * Set the value of manv
         *
         * @return  self
         */ 
        public function setManv($manv)
        {
                $this->manv = $manv;

                return $this;
        }

        /**
         * Get the value of ngaygiao
         */ 
        public function getNgaygiao()
        {
                return $this->ngaygiao;
        }

        /**
         * Set the value of ngaygiao
         *
         * @return  self
         */ 
        public function setNgaygiao($ngaygiao)
        {
                $this->ngaygiao = $ngaygiao;

                return $this;
        }

        /**
         * Get the value of tinhtrang
         */ 
        public function getTinhtrang()
        {
                return $this->tinhtrang;
        }

        /**
         * Set the value of tinhtrang
         *
         * @return  self
         */ 
        public function setTinhtrang($tinhtrang)
        {
                $this->tinhtrang = $tinhtrang;

                return $this;
        }
    }
?>