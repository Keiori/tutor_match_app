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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->datetime('date_time');
            $table->text('feedback');
            $table->timestamps();
            
            $table->foreignId('user_id')->constrained();
            $table->foreignId('admin_id')->constrained();
            $table->foreignId('event_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->dropForeign('feedback_user_id_foreign');
            $table->dropForeign('feedback_admin_id_foreign');
            $table->dropForeign('feedback_event_id_foreign');
        });
        Schema::dropIfExists('feedback');
    }
};
