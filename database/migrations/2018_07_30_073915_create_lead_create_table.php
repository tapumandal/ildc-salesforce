<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_create_lead', function (Blueprint $table) {
            $table->increments('id_create_lead');
            $table->integer('user_id');
            $table->integer('lead_number');
            $table->string('lead_type')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('personal_name')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
            $table->string('area')->nullable();
            $table->tinyInteger('occupation_id')->nullable();
            $table->string('investment_name')->nullable();
            $table->string('investment_type')->nullable();
            $table->date('follow_up_date')->nullable();
            $table->string('contact_status')->nullable();
            $table->string('interest_label')->nullable();
            $table->tinyInteger('investment_action_id')->nullable();
            $table->longText('remark_or_comment')->nullable();
            $table->string('last_action')->nullable();
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
        Schema::dropIfExists('tbl_create_lead');
    }
}
