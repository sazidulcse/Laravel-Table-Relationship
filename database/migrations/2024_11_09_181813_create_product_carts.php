<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_carts', function (Blueprint $table) {
            $table->id();
           $table->string('email',50);
           $table->unsignedBigInteger('product_id');
           $table->string('colour',200);
           $table->string('size',200);


           //relation
           $table->foreign('product_id')->references('id')->on('products')
           ->restrictOnDelete()
           ->cascadeOnUpdate()
           ;

           $table->foreign('email')->references('email')->on('profiles')
           ->restrictOnDelete()
           ->cascadeOnUpdate()
           ;




           $table->timestamp('created_at')->useCurrent();
           $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_carts');
    }
};
