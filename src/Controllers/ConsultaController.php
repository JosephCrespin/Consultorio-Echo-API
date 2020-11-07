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
       $consulta = new consulta($request["name"],["tema"]);
       $consulta->savedb();
       
       $this->index();

    }


    public function delete($id)
    {
        $consultaDelete = new consulta();
        $consulta = $consultaDelete->encontrarId($id);
        $consulta->delete();

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
        $consultaEnviar = new consulta();
        $consulta = $consultaEnviar->encontrarId($id);
        $consulta->rename($request ['name'], $request ['tema']);
        $consulta->update(); 

        $this->index();
    }
    
}



