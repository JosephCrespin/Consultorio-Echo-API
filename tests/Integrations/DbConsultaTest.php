<?php

namespace Tests\Integrations;
use PHPUnit\Framework\TestCase;
use App\Database;
use App\Models\Consulta;



class ConsultaTest extends TestCase
{
    private $db;

    private function initDB()
    {
        $db = new Database();
        // $db->mysql->query("DELETE FROM `consultas`");
        $this->db = $db;
    }


    public function setUp(): void
    {
        $this->initDB();
    }

    public function test_create_consulta()
    {
        $this->db->mysql->query("INSERT INTO `consultas` (`name`,`tema`) VALUES ('Laura', 'Esta cansada');");
        $consulta = new Consulta();
        $result = $consulta->crearListaConsultas();
        $this->assertEquals('Laura', $result[0]->name);
    }
}