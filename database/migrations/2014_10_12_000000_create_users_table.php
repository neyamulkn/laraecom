<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id');
            $table->integer('vendor_id')->nullable();
            $table->string('name', 25);
            $table->string('username', 25);
            $table->integer('gender')->nullable();
            $table->string('birthday')->nullable();
            $table->text('user_dsc')->nullable();

            $table->string('mobile', 15)->unique()->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->string('mobile_verification_token')->nullable();
            $table->string('email', 50)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email_verification_token')->nullable();
            $table->string('password');
            $table->string('temp_password', 15)->nullable();

            $table->decimal('earnings')->default(0);

            $table->integer('country')->nullable();
            $table->decimal('referral_amount')->default(0);
            $table->integer('referral_by')->nullable();
            $table->string('phato', 25)->default('default.png');

            $table->timestamp('last_login')->nullable();
            $table->timestamp('join_date')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=active, 0=deactive');
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
