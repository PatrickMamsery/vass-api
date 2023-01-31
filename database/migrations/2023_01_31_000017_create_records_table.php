<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'records';

    /**
     * Run the migrations.
     * @table records
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('type', 45)->nullable();
            $table->string('content', 45)->nullable();
            $table->timestamp('action_date')->nullable();
            $table->unsignedInteger('client_id');

            $table->index(["client_id"], 'fk_records_clients1_idx');
            $table->nullableTimestamps();


            $table->foreign('client_id', 'fk_records_clients1_idx')
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
