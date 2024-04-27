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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("seller_id");
            $table->foreignId("category_id")->constrained()->onDelete("cascade");
            $table->string("name");
            $table->string("slug");
            $table->string("image");
            $table->text("about");
            $table->unsignedBigInteger("price");
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("seller_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
