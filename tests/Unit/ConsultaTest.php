<?php

namespace Tests\Unit;
use PHPUnit\Framework\TestCase;
use App\Models\Consulta;



class ConsultaTest extends TestCase
{

	public function test_create_consulta()
    {	
        $consulta = new Consulta("id", "Laura", "no da pie con bola", "fecha");
    
        $result = $consulta->hecho;
        $this->assertEquals(false, $result);
    }

}
