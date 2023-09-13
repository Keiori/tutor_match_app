<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_user', function (Blueprint $table) {
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('user_id')->constrained('users');
            $table->primary(['subject_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subject_user', function (Blueprint $table) {
            $table->dropForeign('subject_user_user_id_foreign');
            $table->dropForeign('subject_user_subject_id_foreign');
        });
        Schema::dropIfExists('subject_user');
    }
};
