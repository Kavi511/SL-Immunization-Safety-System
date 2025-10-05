<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_log', function (Blueprint $table) {
            $table->id('ChangeID'); // Auto-increment primary key
            $table->string('TableName', 50);
            $table->enum('OperationType', ['INSERT', 'UPDATE', 'DELETE']);
            $table->integer('RecordID');
            $table->text('ChangeDetails');
            $table->timestamps(); // Includes ChangedAt
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('change_log');
    }
}
