<?php

namespace App\Models;

use App\Database;

class Consulta {


    public $database;
    public $id;
    public $name;
    public $tema;
    public $fecha;

    public function __construct($id = null, $name = "", $tema = "", $fecha = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->tema = $tema;
        $this->fecha = $fecha;
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
            
        return $listaConsultas;
    }
    

    public function savedb() 

    {
        $this->database->mysql->query("INSERT INTO `consultas` (`name`, `tema`) VALUES ('{$_POST["name"]}','{$_POST["tema"]}');");
    }

    public function delete()
    
    {
        $this->database->mysql->query("DELETE FROM `consultas` WHERE `consultas`.`id`={$this->id}");                            
    }
    
    public function encontrarId($id)
    {
        $query = $this->database->mysql->query("SELECT * FROM `consultas` WHERE `id` = {$id}");
        
        $result = $query->fetchAll();
        return new Consulta($result[0]["id"], $result[0]["name"], $result[0]["tema"], $result[0]["fecha"]);
    }

    public function update() 
    {
        $this->database->mysql->query("UPDATE `consultas` SET `name` = '{$this->name}', `tema` ='{$this->tema}' WHERE `consultas`.`id`={$this->id}"); 
    }

    public function rename($name, $tema) 
    {
        $this->name = $name;
        $this->tema = $tema;
    }
    
}

