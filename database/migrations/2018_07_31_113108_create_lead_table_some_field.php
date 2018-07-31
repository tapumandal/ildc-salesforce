<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadTableSomeField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_create_lead', function (Blueprint $table) {
            $table->string('lead_assign')->nullable()->after('personal_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_create_lead', function (Blueprint $table) {
            Schema::drop('lead_assign');
        });
    }
}
