<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'booking';

    /**
     * Run the migrations.
     * @table booking
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('date', 45)->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('address_id');

            $table->index(["client_id"], 'fk_booking_clients1_idx');

            $table->index(["address_id"], 'fk_booking_address1_idx');
            $table->nullableTimestamps();


            $table->foreign('client_id', 'fk_booking_clients1_idx')
                ->references('id')->on('clients')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('address_id', 'fk_booking_address1_idx')
                ->references('id')->on('address')
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
