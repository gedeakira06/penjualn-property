<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTerjualTable extends Migration
{
    public function up()
{
    Schema::create('barang_terjual', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('etalase_id'); // Kolom foreign key
        $table->integer('jumlah_terjual');
        $table->date('tanggal_terjual');
        $table->timestamps();

        // Foreign key constraint
        $table->foreign('etalase_id')->references('id')->on('etalases')->onDelete('cascade');
    });
}

    

    public function down()
    {
        Schema::dropIfExists('barang_terjual');
    }
}