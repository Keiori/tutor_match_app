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
        Schema::create('matchings', function (Blueprint $table) {
            $table->id();
            $table->integer('is_accepted');
            $table->text('comment')->nullable();
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
        Schema::table('matchings', function (Blueprint $table) {
            $table->dropForeign('matchings_user_id_foreign');
            $table->dropForeign('matchings_admin_id_foreign');
        });
        Schema::dropIfExists('matchings');
    }
};
