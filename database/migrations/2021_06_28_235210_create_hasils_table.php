<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasils', function (Blueprint $table) {
            $table->bigIncrements('id_hasil');
            $table->string('id_wilayah');
            $table->string('id_perkebunan');
            $table->string('nama');
            $table->string('jenis');

            $table->string('jumlah');
            $table->string('posisi');
            // $table->string('alamat');

            $table->string('tahun')->nullable();

            $table->string('cover_image')->nullable();
            $table->string('deskripsi');

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
        Schema::dropIfExists('hasils');
    }
}
