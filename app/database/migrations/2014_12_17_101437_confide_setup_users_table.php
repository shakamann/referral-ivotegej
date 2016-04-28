<?php

use Illuminate\Database\Migrations\Migration;

class ConfideSetupUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Creates the users table
        Schema::create('users', function ($table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('confirmation_code');
            $table->string('remember_token')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->timestamps();
        });

        // Creates password reminders table
        Schema::create('password_reminders', function ($table) {
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at');
        });

        // adding the refcamp field columns to the confide setup
        Schema::table('users', function($table)
        {
            $table->string('first_name');
            $table->string('last_name');
            $table->boolean('gender');
            $table->date('birthdate');
            $table->string('state_of_origin');
            $table->string('state_of_residence');
            $table->string('phone');
            $table->string('referred_by')->default('PDP');
            $table->integer('downlines_count');
            $table->string('group_code');
        });

    }

    /**
     * Reverse the migrations.
     */
   public function down()
    {
        Schema::drop('password_reminders');
        Schema::drop('users');
    }
}
