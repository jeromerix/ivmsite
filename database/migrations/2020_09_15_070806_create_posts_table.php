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
            $table->date('OrderDate');
            $table->string('pdf_link');
            $table->date('DeliveryDate');
            $table->date('ConfirmedDelivery');
            $table->text('InProduction');
            $table->text('ready');
            $table->text('send');
            $table->string('CommentarySantexo',255);
            $table->string('CommentarySupplier',255);
            $table->integer('userId');

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
