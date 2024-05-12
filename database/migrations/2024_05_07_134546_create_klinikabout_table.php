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
        Schema::create('klinikabouts', function (Blueprint $table) {
            $table->id('id_aboutklinik'); //ini merupakan kolom unik untuk mengidentifikasi setiap data klinik.
            $table->string('username'); //menyimpan username.
            $table->string('email')->unique(); //menyimpan alamat email, dengan opsi unik.
            $table->string('nama_klinik'); //menyimpan nama klinik.
            $table->string('alamat_lengkap'); //menyimpan alamat lengkap klinik.
            $table->string('kecamatan'); //untuk menyimpan kecamatan.
            $table->string('kabupaten'); //untuk menyimpan kabupaten.
            $table->string('kode_pos'); //menyimpan kode pos.
            $table->string('whatsapp'); //menyimpan nomor WhatsApp.
            $table->string('telephone'); //menyimpan nomor Telepon.
            $table->string('instagram')->nullable(); //untuk menyimpan akun Instagram (opsional).
            $table->string('facebook')->nullable(); //menyimpan akun Facebook (opsional).
            $table->string('website_klinik')->nullable(); //menyimpan akun web klinik (opsional).
            $table->text('tentangklinik')->nullable(); //menyimpan informasi tentang klinik (opsional).
            $table->string('upload_gambar')->nullable(); //menyimpan nama file upload gambar (opsional).
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
        Schema::dropIfExists('klinikabout');
    }
};
