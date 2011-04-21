<?php

/**
 * 
 * This class should handle classes that will be added to 
 * the html body tag.
 * @author Eduardo (eduardo.matos.silva@gmail.com)
 * @version 0.1
 *
 */
class Zend_View_Helper_BodyClass extends Zend_View_Helper_Abstract
{
	/**
	 * 
	 * Classes added by the user
	 * @var array
	 */
	protected $_classes = array();
	
	/**
	 * 
	 * Class 'constructor'
	 * @param string $class
	 */
	public function bodyClass($class = null)
	{
		if($class) {
			$this->addCLass($class);
		}
		return $this;
	}
	
	/**
	 * 
	 * Convert classes to html string
	 */
	public function __toString()
	{
		return ' class="'. implode(' ',$this->_classes) .'" ';
	}
	
	/**
	 * 
	 * Add a class to the queue
	 * @param string $class
	 */
	public function addClass($class)
	{
		$this->_validateClass($class);
		if(!in_array($class,$this->_classes)) {
			array_push($this->_classes,$class);
		}
		return $this;
	}
	
	/**
	 * 
	 * Remove class from queue
	 * @param string $class
	 */
	public function removeClass($class)
	{
		$this->_validateClass($class);
		if($this->classExists($class)) {
			$key = array_search($class,$this->_classes);
			unset($this->_classes[$key]);
		}
		return $this;
	}
	
	/**
	 * 
	 * verifies if some class exists
	 * @param string $class
	 */
	public function classExists($class)
	{
		return in_array($class,$this->_classes);
	}
	
	/**
	 * 
	 * Validate parameter type.
	 * @param mix $class
	 * @throws Zend_Exception
	 */
	protected function _validateClass($class)
	{
		if(!is_string($class)) {
			throw new Zend_Exception('Class must be an string!');
		}
	}
}