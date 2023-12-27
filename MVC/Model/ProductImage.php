<?php
class ProductImage{
    private $ProductID;
    private $img;
    private $IDSort;

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
	public function getImg() {
		return $this->img;
	}
	
	/**
	 * @param mixed $img 
	 * @return self
	 */
	public function setImg($img): self {
		$this->img = $img;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getIDSort() {
		return $this->IDSort;
	}
	
	/**
	 * @param mixed $IDSort 
	 * @return self
	 */
	public function setIDSort($IDSort): self {
		$this->IDSort = $IDSort;
		return $this;
	}
}
?>
