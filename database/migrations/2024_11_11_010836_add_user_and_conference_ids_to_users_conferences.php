<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users_conferences', function (Blueprint $table) {
            if (!Schema::hasColumn('users_conferences', 'user_id')) {
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
            }
            if (!Schema::hasColumn('users_conferences', 'conference_id')) {
                $table->foreignId('conference_id')->constrained()->onDelete('cascade');
            }
        });
    }
    
    public function down()
    {
        Schema::table('users_conferences', function (Blueprint $table) {
            if (Schema::hasColumn('users_conferences', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('users_conferences', 'conference_id')) {
                $table->dropForeign(['conference_id']);
                $table->dropColumn('conference_id');
            }
        });
    }
};
