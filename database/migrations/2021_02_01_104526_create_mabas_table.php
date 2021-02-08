<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateMabasTable extends Migration
{
    public function up()
    {
        Schema::create('maba', function (Blueprint $table) {
            $table->uuid('uuid');
            $table->char('user_uuid');
            $table->char('token_uuid');
            $table->boolean('arsip')->default(false);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('maba');
    }
}
