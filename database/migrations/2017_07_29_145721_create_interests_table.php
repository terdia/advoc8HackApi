<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employer_id');
            $table->integer('maid_id');
            $table->enum('status',
                [
                    'Negotiations in Progress',
                    'Visa Processing', 'Awaiting Payment', 'Release Stage',
                    'Pending Signature', 'Completed', 'Rejected'
                ])->default('Negotiations in Progress');
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
        Schema::dropIfExists('interests');
    }
}
