<?php
class Product{
    private $ProductID;
    private $ProductName;
    private $Series;
    private $Brand;
    private $Note;
    private $ProductStatus;
    private $Price;
	private $Stock;
    public function __construct(){

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
	
	/**
	 * @return mixed
	 */
	public function getSeries() {
		return $this->Series;
	}
	
	/**
	 * @param mixed $Series 
	 * @return self
	 */
	public function setSeries($Series): self {
		$this->Series = $Series;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getBrand() {
		return $this->Brand;
	}
	
	/**
	 * @param mixed $Brand 
	 * @return self
	 */
	public function setBrand($Brand): self {
		$this->Brand = $Brand;
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
	public function getProductStatus() {
		return $this->ProductStatus;
	}
	
	/**
	 * @param mixed $ProductStatus 
	 * @return self
	 */
	public function setProductStatus($ProductStatus): self {
		$this->ProductStatus = $ProductStatus;
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
	public function getStock() {
		return $this->Stock;
	}
	
	/**
	 * @param mixed $Stock 
	 * @return self
	 */
	public function setStock($Stock): self {
		$this->Stock = $Stock;
		return $this;
	}
}   
?>