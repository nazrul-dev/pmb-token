<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateTokensTable extends Migration
{
    public function up()
    {
        Schema::create('token', function (Blueprint $table) {
            $table->uuid('uuid');
            $table->string('email')->unique();
            $table->string('token', 24)->unique();
            $table->string('password');
            $table->integer('angkatan');
            $table->integer('gelombang');
            $table->char('generate');
            $table->integer('use_token')->default(0);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('token');
    }
}
