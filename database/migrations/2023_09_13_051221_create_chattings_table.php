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
        Schema::create('chattings', function (Blueprint $table) {
            $table->id();
            $table->text('chatting');
            $table->boolean('is_admin');
            $table->timestamps();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('admin_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chattings', function (Blueprint $table) {
            $table->dropForeign('chattings_user_id_foreign');
            $table->dropForeign('chattings_admin_id_foreign');
        });
        Schema::dropIfExists('chattings');
    }
};
