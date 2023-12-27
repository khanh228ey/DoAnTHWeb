<?php
class BillDetailClass{
    private $BillDetailID;
    private $ProductID;
    private $ProductName;
    private $Price;
	private $quantity;

	/**
	 * @return mixed
	 */
	public function getBillDetailID() {
		return $this->BillDetailID;
	}
	
	/**
	 * @param mixed $BillDetailID 
	 * @return self
	 */
	public function setBillDetailID($BillDetailID): self {
		$this->BillDetailID = $BillDetailID;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getProductID() {
		return $this->ProductID;
	}
	
	/**
	 * @param mixed $ProductID 
	 * @return self
	 */
	public function setProductID($ProductID): self {
		$this->ProductID = $ProductID;
		return $this;
	}
	/**
	 * @return mixed
	 */
	public function getPrice() {
		return $this->Price;
	}
	
	/**
	 * @param mixed $Price 
	 * @return self
	 */
	public function setPrice($Price): self {
		$this->Price = $Price;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getQuantity() {
		return $this->quantity;
	}
	
	/**
	 * @param mixed $quantity 
	 * @return self
	 */
	public function setQuantity($quantity): self {
		$this->quantity = $quantity;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getProductName() {
		return $this->ProductName;
	}
	
	/**
	 * @param mixed $ProductName 
	 * @return self
	 */
	public function setProductName($ProductName): self {
		$this->ProductName = $ProductName;
		return $this;
	}
}
?>