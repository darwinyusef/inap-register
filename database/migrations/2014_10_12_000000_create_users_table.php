<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_nomigrate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('deleted')->nullable();
            $table->boolean('suspended')->nullable();
            //  $table->string('display_name')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->longText('description');
            //   $table->date('birth')->nullable();
            // $table->enum('gender', ['M', 'F'])->nullable();
            // $table->boolean('pay')->nullable();
            $table->string('idnumber')->unique();
            $table->string('username')->unique();
            // $table->enum('typeId', ['CC', 'TI', 'CE', 'PS', 'NT'])->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('city')->nullable();
            $table->string('department', 100)->nullable();
            // $table->string('typecourse')->nullable();

            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users_nomigrate');
    }
}
