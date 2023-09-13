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
        Schema::create('admin_subject', function (Blueprint $table) {
            $table->foreignId('admin_id')->constrained('admins');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->primary(['admin_id', 'subject_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_subject', function (Blueprint $table) {
            $table->dropForeign('admin_subject_admin_id_foreign');
            $table->dropForeign('admin_subject_subject_id_foreign');
        });
        Schema::dropIfExists('admin_subject');
    }
};
