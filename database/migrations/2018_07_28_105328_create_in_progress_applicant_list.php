<?php

use  Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateInProgressApplicantList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('tbl_ifa_registrations', function($table){
            $table->tinyInteger('is_active')->nullable()->after('national_id_card_no');
            $table->tinyInteger('is_delete')->nullable()->after('is_active');
        });

        DB::table('tbl_ifa_registrations')->insert(
            array(
                'application_no' => '1',
                'application_status' => 'InProgress',
                'first_name' => 'First Name',
                'last_name' => 'Last Name',
                'mobile_no' => '1234567890',
                'email' => 'test1@mail.com',
                'training_status' => 'Applied',
                'is_active' => '1',
                'is_delete' => '0',
                'national_id_card_no' => '213542334'
            )
        );

        DB::table('tbl_ifa_registrations')->insert(
            array(
                'application_no' => '2',
                'application_status' => 'InProgress',
                'first_name' => 'First 2 Name',
                'last_name' => 'Last 2 Name',
                'mobile_no' => '0987654321',
                'email' => 'test2@mail.com',
                'training_status' => 'Applied',
                'is_active' => '1',
                'is_delete' => '0',
                'national_id_card_no' => '3453454'
            )
        );

        DB::table('tbl_ifa_registrations')->insert(
            array(
                'application_no' => '3',
                'application_status' => 'InProgress',
                'first_name' => 'First 3 Name',
                'last_name' => 'Last 3 Name',
                'mobile_no' => '1234509876',
                'email' => 'test3@mail.com',
                'training_status' => 'Applied',
                'is_active' => '1',
                'is_delete' => '0',
                'national_id_card_no' => '3467867554'
            )
        );

        DB::table('tbl_ifa_registrations')->insert(
            array(
                'application_no' => '4',
                'application_status' => 'InProgress',
                'first_name' => 'First 4  Name',
                'last_name' => 'Last 4 Name',
                'mobile_no' => '1234543211',
                'email' => 'test4@mail.com',
                'training_status' => 'Applied',
                'is_active' => '1',
                'is_delete' => '0',
                'national_id_card_no' => '346545434'
            )
        );

        DB::table('tbl_ifa_registrations')->insert(
            array(
                'application_no' => '5',
                'application_status' => 'InProgress',
                'first_name' => 'First 5  Name',
                'last_name' => 'Last 5 Name',
                'mobile_no' => '09876567890',
                'email' => 'test5@mail.com',
                'training_status' => 'Applied',
                'is_active' => '1',
                'is_delete' => '0',
                'national_id_card_no' => '23423424'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
