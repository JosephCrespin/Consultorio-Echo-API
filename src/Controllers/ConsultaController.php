<?php

// porque usar App y namespace
namespace App\Controllers;

use App\Models\Consulta;
use App\Views\View;

class ConsultaController 
{

    public function __construct()
    {   
        if(isset($_GET) && ($_GET["action"] == "create")) {
            $this->create();
            return;
        }

        if(isset($_GET) && ($_GET["action"] == "save")) {
            $this->save($_POST);
            return;
        }

         if(isset($_GET) && ($_GET["action"] == "delete")) {
            $this->delete($_GET["id"]);
            return;
        }

        if(isset($_GET) && ($_GET["action"] == "edit")) {
            $this->edit($_GET["id"]);
            return;
        }

        if(isset($_GET) && ($_GET["action"] == "update")) {
            $this->update($_POST, $_GET["id"]);
            return;
        }
        if(isset($_GET) && ($_GET["action"] == "marcarHecha")) {
            $this->marcarHecha($_POST, $_GET["id"]);
            return;
        }
        if(isset($_GET) && ($_GET["action"] == "done")) {
            $this->historial();
            return;
        }


        $this->index();
    }
   
    public function index(): void
    {
        $consulta = new Consulta();
        $consultas = $consulta->crearListaConsultas();
        
        new View ("ListaConsultas", ["consultas" => $consultas,]);
      
    }

    public function create(): void
    {
    
        new View ("CrearConsulta");

    }
    
    public function save($request): void
    {
        $id = uniqid();
       $consulta = new consulta($id, $request["name"],["tema"]);
       $consulta->savedb();
       
       $this->index();

    }


    public function delete($request)
    {
       
        $id = $request;
        $consultaDelete = new consulta($id);
        $consulta = $consultaDelete->encontrarId($id);
        $consulta->delete($id);

        $this->index();


    }

    public function edit($id)
    {
        $consultaEdit = new consulta();
        $consulta = $consultaEdit->encontrarId($id);

        new View("EditarConsulta",["consulta" => $consulta]);

    }

    public function update(array $request, $id)
    {
        $consultaEnviar = new consulta($id);
        $consulta = $consultaEnviar->encontrarId($id);
        $consulta->rename($request ['name'], $request ['tema']);
        $consulta->update($id); 

        $this->index();
    }

    public function marcarHecha(array $request, $id){

        $consultaHecha = new consulta($id);
        $consulta = $consultaHecha->encontrarId($id);
        $consulta->consultaTerminada($id);
        

        $this->index();
        
    }

    public function historial()
    {
        $consultaHistorial = new consulta();
        $consultas = $consultaHistorial->DoneConsulta();

        new View ("DoneConsultas", ["consultas" => $consultas,]);

    }


}



