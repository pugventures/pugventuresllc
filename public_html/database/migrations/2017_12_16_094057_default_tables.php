<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DefaultTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Users
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->nullable()->default(NULL);
            $table->rememberToken();
            $table->timestamps();
        });

        // Products
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title')->default('No Title - Draft Only');
            $table->text('description')->nullable();
            $table->string('upc')->nullable()->default(NULL);
            $table->string('purchase_url')->nullable();
            $table->decimal('item_cost', 5, 2)->default(0.00);
            $table->decimal('shipping_cost', 5, 2)->default(0.00);
            $table->decimal('dropship_cost', 5, 2)->default(0.00);
            $table->integer('width')->default(0);
            $table->integer('length')->default(0);
            $table->integer('depth')->default(0);
            $table->integer('pounds')->default(0);
            $table->integer('ounces')->default(0);
            $table->timestamps();
        });
        
        // Product Images
        Schema::create('product_images', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->smallInteger('product_id')->unsigned();
            $table->string('image_path');
            $table->timestamps();
        });
        
        // Variation Attributes
        Schema::create('variation_attributes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->timestamps();
        });
        
        // Variation Attribute Options
        Schema::create('variation_attribute_options', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->smallInteger('variation_attribute_id')->unsigned();
            $table->string('name');
            $table->timestamps();
        });
        
        // Misc
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Misc
        Schema::dropIfExists('password_resets');
        
        // Variation Attribute Options
        Schema::dropIfExists('variation_attribute_options');
        
        // Variation Attributes
        Schema::dropIfExists('variation_attributes');
        
        // Product Images
        Schema::dropIfExists('product_images');
        
        // Products
        Schema::dropIfExists('products');
        
        // Users
        Schema::dropIfExists('users');
      
    }
}
