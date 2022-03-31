<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained('users');
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreignId('dept_id')->constrained('departments');
            $table->date('leave_from_date');
            $table->date('leave_to_date');
            $table->string('reason');
            $table->string('status');

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
        Schema::dropIfExists('leaves');
    }
}
