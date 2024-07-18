<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('harga_produk', function (Blueprint $table) {
            $table->id('id_harga');
            $table->unsignedBigInteger('id_user');
            $table->decimal('harga', 10, 2);
            $table->decimal('pasokan', 10, 2);
            $table->unsignedBigInteger('id_satuan_harga');
            $table->unsignedBigInteger('id_satuan_pasokan');
            $table->date('tgl_entry');       
            $table->date('tgl_pelaporan');    
            $table->timestamps();

            // $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            // $table->foreign('id_satuan_harga')->references('id_satuan')->on('satuan')->onDelete('cascade');
            // $table->foreign('id_satuan_pasokan')->references('id_satuan')->on('satuan')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harga_produk');
    }
};
