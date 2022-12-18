<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockopnamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockopnames', function (Blueprint $table) {
            $table->id();
            $table->string('nama_brg');
            $table->string('jenis_brg');
            $table->integer('jml_brg');
            $table->string('supplier');
            $table->decimal('harga_brg',50)->default(0);
            $table->boolean('stats');
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
        Schema::dropIfExists('stockopnames');
    }
}
