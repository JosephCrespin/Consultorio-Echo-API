<?php

namespace Tests\Integrations;
use PHPUnit\Framework\TestCase;
use App\Database;
use App\Models\Consulta;



class ConsultaTestDB extends TestCase
{
    private $db;

    private function initDB()
    {
        $db = new Database();
        $db->mysql->query("DELETE FROM `consultas`");
        $this->db = $db;
    }


    public function setUp(): void
    {
        $this->initDB();
    }

    public function test_create_consulta()
    {
        $this->db->mysql->query("INSERT INTO `consultas` (`id`, `name`,`tema`) VALUES ( '7fgf37363', 'Laura', 'Esta cansada');");
        $consulta = new Consulta();
        $result = $consulta->crearListaConsultas();
        $this->assertEquals('Laura', $result[0]->name);
    }
}