// use SoapClient;
Route::get('/dato',function(){
	// phpinfo();
	$params = array('encoding'=>'UTF-8','verifypeer'=>false,'verifyhost'=>false,'soap_version'=>SOAP_1_2,'trace'=>true);
	$url = "http://190.171.244.211:8080/WebSPedirTaxi/wsPT.asmx?WSDL";
	$client = new SoapClient($url,$params);
	dd($client->__getTypes());
	// dd($client->__getFunctions());
	dd($client->PTCHO_obtenerChofer());
	$rsp = $client->PTCHO_obtenerChofer();
	dd($client->__soapCall('PTPRO_obtenerPropietario')); 
});


Route::get('/prueba',function(){
    	// phpinfo();
    	//Data, connection, auth
        // $dataFromTheForm = $_POST['fieldName']; // request data from the form
        $soapUrl = "http://190.171.244.211:8080/WebSPedirTaxi/wsPT.asmx?op=PTPRO_obtenerPropietario"; // asmx URL of WSDL
        // $soapUser = "username";  //  username
        // $soapPassword = "password"; // password

        // xml post structure
        $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
							<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
							  <soap:Body>
							    <PTPRO_obtenerPropietario xmlns="http://activebs.net/" />
							  </soap:Body>
							</soap:Envelope>';   // data from the form, e.g. some ID number

           $headers = array(
                        "Content-type: text/xml;charset=\"utf-8\"",
                        "Accept: text/xml",
                        "Cache-Control: no-cache",
                        "Pragma: no-cache",
                        "SOAPAction: http://activebs.net/PTPRO_obtenerPropietario", 
                        "Content-length: ".strlen($xml_post_string),
                    ); //SOAPAction: your op URL

            $url = $soapUrl;

            // PHP cURL  for https connection with auth
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_USERPWD, $soapUser.":".$soapPassword); // username and password - declared at the top of the doc
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            // converting
            $response = curl_exec($ch); 
            curl_close($ch);

            // converting
            // $response1 = str_replace("<soap:Body>","",$response);
            // $response2 = str_replace("</soap:Body>","",$response1);

            // convertingc to XML
            $response1 = str_replace("<soap:Body>","",$response);
            $response2 = str_replace("</soap:Body>","",$response1);
            // $response3 = str_replace('&#4;', '', $response2);
            $parser = json_decode(json_encode(simplexml_load_string($response2)), false);
            // $parser = simplexml_load_string($response2);
            // user $parser to get your data out of XML response and to display it.

            return $parser;
			// $params = array('encoding'=>'UTF-8','verifypeer'=>false,'verifyhost'=>false,'soap_version'=>SOAP_1_2,'trace'=>true);
			// $url = "http://190.171.244.211:8080/WebSPedirTaxi/wsPT.asmx?WSDL";
			// $client = new SoapClient($url,$params);
	
});