<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('project_type');
            $table->string('first_name');
            $table->string('last_name');
            $table->bigInteger('status')->nullable()->default('1')->unsigned();
            $table->bigInteger('contact_id')->unsigned();
            $table->string('source')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zipcode')->nullable();
            $table->longText('notes')->nullable();
            $table->boolean('active')->nullable()->default('0');
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->timestamps();
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');    
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
        Schema::dropIfExists('leads');
    }
}
