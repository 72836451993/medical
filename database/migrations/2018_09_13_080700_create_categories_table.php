<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('categories')){
            throw new Exception('"categories" table already exist in selected database /n migration stopped');
        }
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name');
            $table->timestamps();
        });
        DB::table('categories')->insert(
            array(
                array(
                    'category_name' => 'Analgesic'
                ),
                array(
                    'category_name' => 'Anesthetic'
                ),
                array(
                    'category_name' => 'Anthelmintic'
                ),
                array(
                    'category_name' => 'Anticoagulant'
                ),
                array(
                    'category_name' => 'Anticonvulsant'
                ),
                array(
                    'category_name' => 'Antiemetic'
                ),
                array(
                    'category_name' => 'Antimalarials'
                ),
                array(
                    'category_name' => 'Carcinogens'
                ),
                array(
                    'category_name' => 'Diuretic'
                ),
                array(
                    'category_name' => 'Glucocorticoid'
                ),

            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
