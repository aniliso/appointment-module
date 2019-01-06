<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateColumnToAppointmentAppointmentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointment__appointments', function(Blueprint $table)
        {
            $table->dateTime('appointment_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointment__appointments', function(Blueprint $table)
        {
            $table->dropColumn('appointment_at');
        });
    }

}
