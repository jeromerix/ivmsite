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
            $table->date('DeliveryDate')->nullable()->default(null);
            $table->date('ConfirmedDelivery')->nullable()->default(null);
            $table->text('InProduction')->nullable()->default(null);
            $table->text('ready')->nullable()->default(null);
            $table->text('send')->nullable()->default(null);
            $table->string('CommentarySantexo',255)->nullable()->default(null);
            $table->string('CommentarySupplier',255)->nullable()->default(null);
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
