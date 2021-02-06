<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateDistrictsTable extends Migration
{
    public function up()
    {
        Schema::create(config('laravolt.indonesia.table_prefix').'districts', function (Blueprint $table) {
            $table->char('id', 7);
            $table->char('city_id', 4);
            $table->string('name', 255);
            $table->text('meta')->nullable();
            $table->primary('id');
            $table->timestamps();
            $table->foreign('city_id')
                ->references('id')
                ->on(config('laravolt.indonesia.table_prefix').'cities')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }
    public function down()
    {
        Schema::drop(config('laravolt.indonesia.table_prefix').'districts');
    }
}
