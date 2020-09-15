<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->OrderDate()
            $table->string('pdf_url');
            $table->DesiredDelivery();
            $table->ConfirmedDelivery();
            $table->InProduction();
            $table->Ready();
            $table->Send();
            $table->CommentarySantexo();
            $table->CommentarySupplier();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
