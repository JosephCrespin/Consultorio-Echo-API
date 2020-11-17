<?php

namespace App\Models;

use App\Database;
use App\Logger\Logger;

class Consulta {


    public $database;
    public $id;
    public $name;
    public $tema;
    public $fecha;
    public $hecho;

    public function __construct($id = null, $name = "", $tema = "", $fecha = null, $hecho = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->tema = $tema;
        $this->fecha = $fecha;
        $this->hecho = $hecho;
        if(!$this->database) {
            $this->database = new Database();
        }
    }

    public function crearListaConsultas ()
    {
        $query = $this->database->mysql->query("select * FROM consultas");
     
        // Para que serve el fetchAll?????? = nose 

        // $consultasArray = $query->fetchAll();

        $listaConsultas = [];

            foreach ($query as $consulta) {
                $itemConsulta = new Consulta($consulta["id"], $consulta["name"],  $consulta["tema"], $consulta["fecha"]);
                array_push($listaConsultas, $itemConsulta);
            }
            
        Logger::log("get", "createList");
         
        return $listaConsultas;
    }
    

    public function savedb() 

    {
        
        $this->database->mysql->query("INSERT INTO `consultas` (`id`,`name`, `tema`) VALUES ('{$this->id}','{$_POST["name"]}','{$_POST["tema"]}');");
        Logger::log("Post", "save");
        
        
    }

    public function delete($id)
    
    {
        $this->database->mysql->query("DELETE FROM `consultas` WHERE `consultas`.`id`='{$id}'");                            
    }
    
    public function encontrarId($id)
    {
        $query = $this->database->mysql->query("SELECT * FROM `consultas` WHERE `id` = '{$id}'");
        
        $result = $query->fetchAll();
        return new Consulta($result[0]["id"], $result[0]["name"], $result[0]["tema"], $result[0]["fecha"], $result[0]["hecho"]);
        
    }

    public function update($id) 
    {
        $this->database->mysql->query("UPDATE `consultas` SET `name` = '{$this->name}', `tema` ='{$this->tema}' WHERE `consultas`.`id`='{$id}'"); 
    }

    public function rename($name, $tema) 
    {
        $this->name = $name;
        $this->tema = $tema;
    }

    public function consultaTerminada($id) 
    {
        $this->hecho = true;
        $this->database->mysql->query("UPDATE `consultas` SET `hecho` = '{$this->hecho}' WHERE `consultas`.`id`={$this->id}"); 
    }
    
}

