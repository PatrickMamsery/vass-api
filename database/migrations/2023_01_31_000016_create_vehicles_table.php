<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'vehicles';

    /**
     * Run the migrations.
     * @table vehicle
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('make_id');
            $table->unsignedInteger('model_id');
            $table->string('manufacture_year', 45)->nullable();
            $table->nullableTimestamps();

            $table->index(["make_id"], 'fk_vehicle_make1_idx');

            $table->index(["model_id"], 'fk_vehicle_model1_idx');

            $table->index(["client_id"], 'fk_vehicle_clients1_idx');


            $table->foreign('make_id', 'fk_vehicle_make1_idx')
                ->references('id')->on('makes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('model_id', 'fk_vehicle_model1_idx')
                ->references('id')->on('models')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('client_id', 'fk_vehicle_clients1_idx')
                ->references('id')->on('clients')
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
