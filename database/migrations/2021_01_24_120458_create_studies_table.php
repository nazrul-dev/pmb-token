<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateStudiesTable extends Migration
{
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id');
            $table->string('name');
            $table->integer('kouta')->default(0);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('studies');
    }
}
