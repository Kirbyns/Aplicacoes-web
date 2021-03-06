<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\VendedoresController;

class VendedoresControllerTest extends TestCase
{



    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCheckVendedor()
    {
        $vendedores = new VendedoresController;

        $this->assertTrue($vendedores->checkVendedor(1));
        $this->assertFalse($vendedores->checkVendedor(5));
    }

    public function testGetVendedor(){
        $this->assertEquals('Paulo',$this->vendedores->getVendedor(1));
    }
}
