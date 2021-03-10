<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProSpecifisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pro_specifis', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name_product')->collation('utf8_unicode_ci');
            $table->text('screen')->collation('utf8_unicode_ci')->nullable();
            $table->text('os')->collation('utf8_unicode_ci')->nullable();
            $table->text('camera_pre')->collation('utf8_unicode_ci')->nullable();
            $table->text('camera_affter')->collation('utf8_unicode_ci')->nullable();
            $table->text('cpu')->collation('utf8_unicode_ci')->nullable();
            $table->text('gpu')->collation('utf8_unicode_ci')->nullable();
            $table->text('ram')->collation('utf8_unicode_ci')->nullable();
            $table->text('rom')->collation('utf8_unicode_ci')->nullable();
            $table->text('battery')->collation('utf8_unicode_ci')->nullable();
            $table->text('weight')->collation('utf8_unicode_ci')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pro_specifis');
    }
}
