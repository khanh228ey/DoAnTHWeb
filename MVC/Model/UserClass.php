<?php
class User{
    private $CustomerID;
    private $FirstName;
    private $LastName;
    private $Email;
    private $Password;
    private $Roles;
    private $Phonenumber;
    private $Address;

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
	public function getFirstName() {
		return $this->FirstName;
	}
	
	/**
	 * @param mixed $FirstName 
	 * @return self
	 */
	public function setFirstName($FirstName): self {
		$this->FirstName = $FirstName;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getLastName() {
		return $this->LastName;
	}
	
	/**
	 * @param mixed $LastName 
	 * @return self
	 */
	public function setLastName($LastName): self {
		$this->LastName = $LastName;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->Email;
	}
	
	/**
	 * @param mixed $Email 
	 * @return self
	 */
	public function setEmail($Email): self {
		$this->Email = $Email;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->Password;
	}
	
	/**
	 * @param mixed $Password 
	 * @return self
	 */
	public function setPassword($Password): self {
		$this->Password = $Password;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getRoles() {
		return $this->Roles;
	}
	
	/**
	 * @param mixed $Roles 
	 * @return self
	 */
	public function setRoles($Roles): self {
		$this->Roles = $Roles;
		return $this;
	}
	/**
	 * @return mixed
	 */
	public function getAddress() {
		return $this->Address;
	}
	
	/**
	 * @param mixed $Address 
	 * @return self
	 */
	public function setAddress($Address): self {
		$this->Address = $Address;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPhonenumber() {
		return $this->Phonenumber;
	}
	
	/**
	 * @param mixed $Phonenumber 
	 * @return self
	 */
	public function setPhonenumber($Phonenumber): self {
		$this->Phonenumber = $Phonenumber;
		return $this;
	}
}
?>