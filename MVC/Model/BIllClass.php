<?php
    class Bill{
        private $BillID;
        private $Daybuy;
        private $CustomerID;
        private $PriceBill;
        private $Note;
        private $EmailCustomer;
        private $phonenumber;
        private $Status;
        private $Total;
		private $addressdelivery;
	/**
	 * @return mixed
	 */
	public function getBillID() {
		return $this->BillID;
	}
	
	/**
	 * @param mixed $BillID 
	 * @return self
	 */
	public function setBillID($BillID): self {
		$this->BillID = $BillID;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getDaybuy() {
		return $this->Daybuy;
	}
	
	/**
	 * @param mixed $Daybuy 
	 * @return self
	 */
	public function setDaybuy($Daybuy): self {
		$this->Daybuy = $Daybuy;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getCustomerID() {
		return $this->CustomerID;
	}
	
	/**
	 * @param mixed $CustomerID 
	 * @return self
	 */
	public function setCustomerID($CustomerID): self {
		$this->CustomerID = $CustomerID;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getPriceBill() {
		return $this->PriceBill;
	}
	
	/**
	 * @param mixed $PriceBill 
	 * @return self
	 */
	public function setPriceBill($PriceBill): self {
		$this->PriceBill = $PriceBill;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getNote() {
		return $this->Note;
	}
	
	/**
	 * @param mixed $Note 
	 * @return self
	 */
	public function setNote($Note): self {
		$this->Note = $Note;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getEmailCustomer() {
		return $this->EmailCustomer;
	}
	
	/**
	 * @param mixed $EmailCustomer 
	 * @return self
	 */
	public function setEmailCustomer($EmailCustomer): self {
		$this->EmailCustomer = $EmailCustomer;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getphonenumber() {
		return $this->phonenumber;
	}
	
	/**
	 * @param mixed $PhoneNumber 
	 * @return self
	 */
	public function setphonenumber($phonenumber): self {
		$this->phonenumber = $phonenumber;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getStatus() {
		return $this->Status;
	}
	
	/**
	 * @param mixed $Status 
	 * @return self
	 */
	public function setStatus($Status): self {
		$this->Status = $Status;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getTotal() {
		return $this->Total;
	}
	
	/**
	 * @param mixed $Total 
	 * @return self
	 */
	public function setTotal($Total): self {
		$this->Total = $Total;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAddressdelivery() {
		return $this->addressdelivery;
	}
	
	/**
	 * @param mixed $addressdelivery 
	 * @return self
	 */
	public function setAddressdelivery($addressdelivery): self {
		$this->addressdelivery = $addressdelivery;
		return $this;
	}
}
?>