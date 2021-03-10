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
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name_product')->collation('utf8_unicode_ci');
            $table->text('des_product')->collation('utf8_unicode_ci');
            $table->integer('price');
            $table->integer ('discount');
            $table->text ('image_avatar')->collation('utf8_unicode_ci');;
            $table->text ('images_list')->collation('utf8_unicode_ci')->nullable();
            $table->integer ('count');
            $table->integer ('brand_id');
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
