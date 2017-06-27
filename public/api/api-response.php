<?php  

class ApiResponse
{
	public $wasSuccessful; // bool
	public $message; // string
	public $data; // custom object

	function __construct($wasSuccessful, $message, $data) {
		$this->wasSuccessful = $wasSuccessful;
		$this->message = $message;
		$this->data = $data;
	}
}

?>