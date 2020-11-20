<?php

// porque usar App y namespace
namespace App\Controllers;

use App\Models\Consulta;
use App\Views\View;

class ConsultaController 
{

    public function __construct()
    {   
        if(isset($_GET)){
            if(isset($_GET["action"])){
                switch ($_GET["action"]) {
                    case 'create':
                       $this->create();
                        break;
                    case 'save':
                        $this->save($_POST);
                        break;
                    case 'delete':
                        $this->delete($_GET["id"]);
                            break;
                    case 'edit':
                        $this->edit($_GET["id"]);
                        break; 
                    case 'update':
                        $this->update($_POST, $_GET["id"]);
                        break; 
                    case 'marcarHecha':
                        $this->marcarHecha($_POST, $_GET["id"]);
                        break; 
                    case 'done':
                        $this->historial();
                        break;     
                    
                    default:
                        $this->index();
                        break;
                }
            
            }else{

                $this->index();

            }


        } 
        
        
        
      
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
       $consulta = new consulta($id, $request["name"],$request["tema"]);
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



