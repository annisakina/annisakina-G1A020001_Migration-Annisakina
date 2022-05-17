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
        Schema::create('photo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('album_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreignId('member_id')->constrained('member')->onDelete('cascade');

            $table->string('title', 120);
            $table->string('description',255)->nullable();
            $table->string('privacy', 20);
            $table->date('upload_date');
            $table->integer('view',10)->default(0);
            $table->string('image_path', 50);

            $table->foreign('album_id')->references('id')->on('album')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('location')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo');
    }
};
