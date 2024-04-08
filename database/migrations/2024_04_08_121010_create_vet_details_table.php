<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVetDetailsTable extends Migration
{
    public $tableName = 'vet_details';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('license_no');
            $table->date('license_expiry')->nullable();
            $table->string('licence_copy')->nullable();
            $table->nullableTimestamps();

            $table->index(["user_id"], 'fk_vet_details_users_idx');

            $table->foreign('user_id', 'fk_vet_details_users_idx')
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
        Schema::dropIfExists($this->tableName);
    }
}
