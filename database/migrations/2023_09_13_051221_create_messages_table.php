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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->timestamps();
            $table->softDeletes();
            
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
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('messages_user_id_foreign');
            $table->dropForeign('messages_admin_id_foreign');
        });
        Schema::dropIfExists('messages');
    }
};
