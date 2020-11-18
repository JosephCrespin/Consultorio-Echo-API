<?php
namespace App\Core;

use App\Controllers\ApiController;

class ApiRouter{

    private $requestMethod;
    private $content;
    private $id;
    
    public function __construct($request, $id){

        $this->requestMethod = $request['REQUEST_METHOD'];
        $this->content = json_decode(file_get_contents("php://input"), true);
        $this->id = $id;
        $this->execute();

    }

    private function execute(){

        new ApiController($this->requestMethod,$this->content, $this->id );

    }



}



?>