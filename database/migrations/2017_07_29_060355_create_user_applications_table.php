<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('bio')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('address')->nullable();
            $table->enum('type', ['Maid', 'Employer'])->default(NULL);
            $table->enum('gender', ['Male', 'Female'])->default(NULL);
            $table->enum('marital_status', ['Married', 'Single', 'Divorce']);
            $table->enum('status',
                [
                    'Not Completed','Pending Verification',
                    'Completed','Application Rejected'
                ])
                ->default('Not Completed');
            $table->string('purpose')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('occupation')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_applications');
    }
}
