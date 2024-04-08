<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vet_id');
            $table->unsignedBigInteger('user_id');
            $table->date('date');
            $table->time('from');
            $table->time('to');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->nullableTimestamps();

            $table->index(["vet_id"], 'fk_appointments_vets_idx');

            $table->index(["user_id"], 'fk_appointments_users_idx');

            $table->foreign('vet_id', 'fk_appointments_vets_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_id', 'fk_appointments_users_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
