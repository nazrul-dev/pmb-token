<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreatePengaturansTable extends Migration
{
    public function up()
    {
        Schema::create('pengaturan', function (Blueprint $table) {
            $table->id();
            $table->boolean('pmb')->default(false);
            $table->integer('angkatan')->default(date('Y'));
            $table->integer('gelombang')->default(1);
            $table->boolean('email_token')->default(true);
            $table->boolean('email_account')->default(true);
            $table->text('logo')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('pengaturan');
    }
}
