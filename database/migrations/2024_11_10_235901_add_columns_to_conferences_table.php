<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToConferencesTable extends Migration
{
    public function up()
    {
        Schema::table('conferences', function (Blueprint $table) {
            $table->string('title');
            $table->text('description');
            $table->date('date');
            $table->string('location');
        });
    }

    public function down()
    {
        Schema::table('conferences', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'date', 'location']);
        });
    }
}
