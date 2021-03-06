<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('primary_f_name');
            $table->string('primary_l_name');
            $table->string('primary_phone_1')->nullable();
            $table->string('primary_phone_1_type')->nullable();
            $table->string('primary_phone_2')->nullable();
            $table->string('primary_phone_2_type')->nullable();
            $table->string('primary_email')->nullable();
            $table->string('relationship')->nullable();
            $table->string('secondary_f_name')->nullable();
            $table->string('secondary_l_name')->nullable();
            $table->string('secondary_phone_1')->nullable();
            $table->string('secondary_phone_1_type')->nullable();
            $table->string('secondary_phone_2')->nullable();
            $table->string('secondary_phone_2_type')->nullable();
            $table->string('secondary_email')->nullable();            
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('company')->nullable();
            $table->string('title')->nullable();
            $table->longText('notes')->nullable();
            $table->string('source')->nullable();
            $table->string('label')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('active')->nullable()->default('0');
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->bigInteger('status')->nullable()->default('1')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('status')->references('id')->on('contact_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
