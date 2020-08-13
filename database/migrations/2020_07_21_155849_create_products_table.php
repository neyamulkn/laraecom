<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->integer('vendor_id')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('childcategory_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->char('feature_image', 225)->default('default.png')->nullable();
            $table->decimal('purchase_price')->default(0);
            $table->decimal('selling_price')->default(0);
            $table->char('discount',5)->nullable();
            $table->integer('stock')->default(0);
            $table->integer('total_stock')->default(0);
            $table->date('manufacture_date')->nullable();
            $table->date('expired_date')->nullable();
            $table->string('sku')->nullable();
            $table->string('hsn')->nullable();
            $table->integer('views')->default(0);
            $table->tinyInteger('featured')->nullable();
            $table->tinyInteger('best')->nullable();
            $table->tinyInteger('top')->nullable();
            $table->tinyInteger('hot')->nullable();
            $table->char('shipping_time', 50)->nullable();
            $table->integer('sales')->default(0);
            $table->double('avg_ratting')->default(0);
            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->softDeletes();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
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
}
