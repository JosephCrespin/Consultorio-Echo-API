<?php

namespace Tests\Unit;
use PHPUnit\Framework\TestCase;
use App\Models\Consulta;



class ExampleTest extends TestCase
{

	public function test_create_consulta()
	{
        //scenario
        $consulta = new consulta("id", "Laura", "no da pie con bola", "fecha");
    
        //when
        $consulta->savedb();

        //then
        $result = $consulta->name;
        $this->assertEquals($consulta, $result);
    }
    
}