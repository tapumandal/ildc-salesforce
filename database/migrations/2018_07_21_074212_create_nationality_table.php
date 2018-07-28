<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNationalityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_nationalitys', function (Blueprint $table) {
            $table->increments('id_nationality');
            $table->integer('user_id');
            $table->string('nationality');
            $table->integer('is_deleted')->default('0');
            $table->integer('is_active')->default('0');
            $table->string('last_action');
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
        Schema::dropIfExists('tbl_nationalitys');
    }
}
