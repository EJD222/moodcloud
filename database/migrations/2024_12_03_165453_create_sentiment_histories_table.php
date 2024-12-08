<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentimentHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('sentiment_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Use unsignedBigInteger for foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Add foreign key constraint
            $table->string('sentiment');
            $table->integer('score');
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->text('text')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sentiment_histories');
    }
}