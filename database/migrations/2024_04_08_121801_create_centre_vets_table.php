<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentreVetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centre_vets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vet_center_id');
            $table->unsignedBigInteger('vet_id');
            $table->nullableTimestamps();

            $table->index(["vet_center_id"], 'fk_centre_vets_vet_centers_idx');

            $table->index(["vet_id"], 'fk_centre_vets_users_idx');

            $table->foreign('vet_center_id', 'fk_centre_vets_vet_centers_idx')
                ->references('id')->on('vet_centers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('vet_id', 'fk_centre_vets_users_idx')
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
        Schema::dropIfExists('centre_vets');
    }
}
