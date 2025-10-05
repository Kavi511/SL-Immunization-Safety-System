<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdverseEffectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverse_effects', function (Blueprint $table) {
            $table->id('EffectID'); // Auto-increment primary key
            $table->integer('vaccination_records_id'); // References 'vaccination_records.RecordID'
            $table->text('Description');
            $table->enum('Severity', ['Mild', 'Moderate', 'Severe']);
            $table->integer('reported_by') ;// References 'users.id'
            $table->date('ReportedDate');
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
        Schema::dropIfExists('adverse_effects');
    }
}
