<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    const TABLE_NAME = 'posts';

    public function up()
    {
        if(!Schema::hasTable(self::TABLE_NAME)) {
            Schema::create(self::TABLE_NAME, function (Blueprint $table){
                $table->id();
                $table->string('title');
                $table->string('slug');
                $table->text('content');
                $table->string('image')->nullable();
                $table->integer('likes')->nullable();
                $table->boolean('is_published')->default(1);
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
