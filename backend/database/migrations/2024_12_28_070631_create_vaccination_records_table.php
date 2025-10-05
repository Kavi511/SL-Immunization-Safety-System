<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinationRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccination_records', function (Blueprint $table) {
            $table->id('RecordID'); // Auto-increment primary key
            $table->foreignId('PatientID')->constrained('patients')->cascadeOnDelete();
            $table->foreignId('VaccineID')->constrained('vaccines')->cascadeOnDelete();
            $table->foreignId('AdministeredBy')->constrained('users')->cascadeOnDelete();
            $table->boolean('AdverseEffectsReported')->default(false);
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
        Schema::dropIfExists('vaccination_records');
    }
}
