<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProdutosVenda',function(Blueprint $table){
            $table->id();
            $table->bigInterger('vendas_id')->unsigned();
            $table->bigInterger('produtos_id')->unsigned();
            $table->interger('quantidade');
            $table->double('valor', 12, 2);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
