<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreatePengumumenTable extends Migration
{
    public function up()
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->integer('angkatan');
            $table->integer('gelombang');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('pengumuman');
    }
}
