<?php 
Class SpLoi{
    private $maTH;
    private $masp;
    private $tensp;
    private $madh;
    private $sldt;
    private $noidung;
    private $tinhtrang;

    /**
     * Get the value of maTH
     */ 
    public function getMaTH()
    {
        return $this->maTH;
    }

    /**
     * Set the value of maTH
     *
     * @return  self
     */ 
    public function setMaTH($maTH)
    {
        $this->maTH = $maTH;

        return $this;
    }

    /**
     * Get the value of masp
     */ 
    public function getMasp()
    {
        return $this->masp;
    }

    /**
     * Set the value of masp
     *
     * @return  self
     */ 
    public function setMasp($masp)
    {
        $this->masp = $masp;

        return $this;
    }

    /**
     * Get the value of tensp
     */ 
    public function getTensp()
    {
        return $this->tensp;
    }

    /**
     * Set the value of tensp
     *
     * @return  self
     */ 
    public function setTensp($tensp)
    {
        $this->tensp = $tensp;

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
     *
     * @return  self
     */ 
    public function setMadh($madh)
    {
        $this->madh = $madh;

        return $this;
    }

    /**
     * Get the value of sldt
     */ 
    public function getSdt()
    {
        return $this->sldt;
    }

    /**
     * Set the value of sldt
     *
     * @return  self
     */ 
    public function setSdt($sldt)
    {
        $this->sldt = $sldt;

        return $this;
    }

    /**
     * Get the value of noidung
     */ 
    public function getNoidung()
    {
        return $this->noidung;
    }

    /**
     * Set the value of noidung
     *
     * @return  self
     */ 
    public function setNoidung($noidung)
    {
        $this->noidung = $noidung;

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