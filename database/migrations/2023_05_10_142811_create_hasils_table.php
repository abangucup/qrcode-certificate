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
        Schema::create('hasils', function (Blueprint $table) {
            $table->id();
            $table->string('hasil_bakteri')->nullable();
            $table->string('hasil_kimia')->nullable();
            $table->string('hasil_fisik')->nullable();
            $table->string('hasil_uji')->nullable();
            $table->string('sertifikat_layak_sehat')->nullable();
            $table->string('sertifikat_penjamak_makanan')->nullable();
            $table->string('sertifikat_penjamak_pj')->nullable();
            $table->string('hasil_pemeriksaan')->nullable();
            $table->string('nib')->nullable();
            $table->string('izin_usaha')->nullable();
            $table->foreignId('usaha_id')->constrained();
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
};
