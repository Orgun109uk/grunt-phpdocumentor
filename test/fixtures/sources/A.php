<?php 

/**
 * @package \GoMoob\Grunt\PhpDocumentor
 */
namespace \GoMoob\Grunt\PhpDocumentor;

/**
 * Simple class used to generate a test PHPDocumentor documentation.
 * 
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
class A {
	
	/**
	 * A string attribute.
	 * 
	 * @var string
	 */
	private $stringAttribute;
	
	/**
	 * Gets the string attribute.
	 * 
	 * @return string the string attribute.
	 */
	public function getStringAttribute() {
		
		return $this -> stringAttribute;
		
	}
	
	/**
	 * Sets the string attribute.
	 * 
	 * @param string $stringAttribute the string attribute to set.
	 */
	public function setStringAttribute($stringAttribute) {
		
		$this -> stringAttribute = $stringAttribute;
		
	}

}