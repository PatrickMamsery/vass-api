<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'deliveries';

    /**
     * Run the migrations.
     * @table deliveries
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('date', 45)->nullable();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('address_id');
            $table->unsignedInteger('client_id');
            $table->enum('status', ['PENDING', 'DELIVERED', 'CANCELED'])->default('PENDING');
            $table->string('time')->nullable();

            $table->index(["product_id"], 'fk_deliveries_products1_idx');
            $table->nullableTimestamps();
            $table->index(["address_id"], 'fk_deliveries_addresses1_idx');
            $table->index(["client_id"], 'fk_deliveries_clients1_idx');


            $table->foreign('product_id', 'fk_deliveries_products1_idx')
                ->references('id')->on('products')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('address_id', 'fk_deliveries_addresses1_idx')
                ->references('id')->on('address')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('client_id', 'fk_deliveries_clients1_idx')
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
