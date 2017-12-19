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
        
        // Product Types
        Schema::create('product_types', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('type');
            $table->timestamps();
        });
        
        // Brands
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('brand');
            $table->timestamps();
        });
        
        // Vendors
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->string('catalog_url');
            $table->timestamps();
        });
        
        // Products
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->decimal('price', 5, 2)->default(0.00);
            $table->string('callout', 250)->nullable()->default(NULL);
            $table->text('description');
            $table->string('sku')->nullable()->default(NULL);
            $table->string('seo_page_title')->nullable()->default(NULL);
            $table->string('seo_meta_desc', 160)->nullable()->default(NULL);
            $table->string('seo_url')->nullable()->default(NULL);
            $table->smallInteger('product_type_id')->unsigned();
            $table->smallInteger('brand_id')->nullable()->default(NULL)->unsigned();
            $table->smallInteger('vendor_id')->unsigned();
            $table->string('purchase_url');
            $table->timestamps();
            
            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('vendor_id')->references('id')->on('vendors');
        });
        
        // Product Images
        Schema::create('product_images', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->smallInteger('product_id')->unsigned();
            $table->string('image_path');
            $table->smallInteger('priority');
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
        
        // Product Images
        Schema::dropIfExists('product_images');
        
        // Products
        Schema::dropIfExists('products');
        
        // Vendors
        Schema::dropIfExists('vendors');
        
        // Brands
        Schema::dropIfExists('brands');
        
        // Product Types
        Schema::dropIfExists('product_types');
        
        // Users
        Schema::dropIfExists('users');
      
    }
}
