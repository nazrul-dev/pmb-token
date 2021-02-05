<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->uuid('uuid');
            $table->uuid('maba_id');
            $table->text('nama_lengkap');
            $table->string('no_registrasi');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('asal_sekolah');
            $table->integer('tahun_lulus');
            $table->string('jurusan');
            
            $table->enum('agama',['Islam', 'Protestan','Katolik', 'Hindu', 'Budha', 'Konghucu', 'lainnya']);
            $table->string('alamat');
            $table->string('telepon');
            $table->enum('ukuran_baju', ['XXL', 'XL', 'L', 'M', 'S']);
            $table->enum('pilihan_kelas', ['pagi', 'sore']);
       
            $table->integer('fakultas');
            $table->integer('prodi');
            $table->integer('provinsi');
            $table->integer('kabupaten');
            $table->integer('kecamatan');
            // File 
            $table->text('ijazah')->nullable();
            $table->text('passphoto')->nullable();
            $table->text('kartu_keluarga')->nullable();
            $table->text('akta')->nullable();
            $table->text('ktp')->nullable();
        
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
        Schema::dropIfExists('biodata');
    }
}
