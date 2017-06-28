<?php  
require_once 'api-response.php';
require_once '../../src/cep/cep-service.php';
require_once '../../src/cep/cep.php';

//header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	echo json_encode(new ApiResponse(false, "ERROR: wrong HTTP method", NULL));
	return;
}

$json = file_get_contents('php://input');
if (!$json) {
	echo json_encode(new ApiResponse(false, "ERROR: invalid request data", NULL));
	return;
}

$assoc = json_decode($json, true);
$request = new CepRequest($assoc);
if (!$request) {
	echo json_encode(new ApiResponse(false, "ERROR: invalid request data", NULL));
	return;
}

// calling actual service
$result = getCompleteAddressForCep($request->cep);
if (!$result) {
   echo json_encode(new ApiResponse(false, "ERROR: could not list contacts", NULL));
   return;
}

echo json_encode(new ApiResponse(true, "Successfully listed contacts", $result));



class CepRequest
{
	public $cep;

	public function __construct(array $assoc)
	{
		$this->cep = $assoc['cep'];
	}
}

?>