<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Clientes;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientesTest extends TestCase
{

    use DatabaseTransactions; //isso faz dar rollback no banco de dados.
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $cliente = Clientes::create(['nome'      => 'Matheus test',
                                     'endereco'  => 'Senac',
                                     'email'     => 'fakematheus@gmail.com',
                                     'telefone'  => '999999999']);

        $this->assertDatabaseHas('clientes', ['nome' => 'Matheus test']); // testa se cliente existe na base

       /*
       metodo não elgante mas que destroy
       $cliente->destroy($cliente->id);
        $this->assertDatabaseMissing('clientes', ['nome' => 'Matheus test']); */
    }
}
