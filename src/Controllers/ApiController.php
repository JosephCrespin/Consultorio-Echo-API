<?php

// porque usar App y namespace
namespace App\Controllers;

use App\Models\Consulta;
use App\Views\View;

class ApiController
{

    public $method;
    
    
    public function __construct()
    {   
        $this->method = $_SERVER["REQUEST_METHOD"];

        if($this->method == "GET") {
            $this->index();
        }
        
        if($this->method == "POST") {
            $this->save();
        }   
        
        if($this->method == "DELETE") {
               
            $this->delete($_GET["id"]);
        }

        if($this->method == "PUT") {
           
            $this->update();
        }
        
       
    }
        
   
    public function index(): void
    {
        $consulta = new Consulta();

        $consultas = $consulta->crearListaConsultas();
        $listaJson = [];

        foreach($consultas as $consulta)  {
            $consultaJson = [
                "id" => $consulta->id,
                "name" => $consulta->name,
                "tema" => $consulta->tema,
                "fecha" => $consulta->fecha,
                
            ];
            array_push($listaJson, $consultaJson);
        }
        
        echo json_encode($listaJson);
      
    }

       
    public function save(): void
    {
        $id = uniqid();
       $request = json_decode(file_get_contents("php://input"), true); 
       $consulta = new consulta($id, $request["name"], $request["tema"]);
       $consulta->savedb();
       $consultaJson = [
        "id" => $consulta->id,
        "name" => $consulta->name,
        "tema" => $consulta->tema,
        "fecha" => $consulta->fecha,
        "hecho" => $consulta->hecho
        
       ];
        echo json_encode($consultaJson);
    }


    public function delete($id)
    {
        $consultaDelete = new consulta($id);
        $consulta = $consultaDelete->encontrarId($id);
        $consulta->delete($id);
    }

   
    public function update()
    {
        $id = $_GET["id"];
        $request = json_decode(file_get_contents("php://input"), true); 
        $consultaEnviar = new consulta();
        $consulta = $consultaEnviar->encontrarId($id);
        $consulta->rename($request ['name'], $request['tema']);
        $consulta->update($id); 
        $consultaJson = [
            "id" => $consulta->id,
            "name" => $consulta->name,
            "tema" => $consulta->tema,
            "fecha" => $consulta->fecha,
            "hecho" => $consulta->hecho
            
           ];

        echo json_encode($consultaJson);

    }

    
    
}



