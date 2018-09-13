<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('producers')){
            throw new Exception('"producers" table already exist in selected database /n migration stopped');
        }
        Schema::create('producers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('producer_name');
            $table->timestamps();
        });
        DB::table('producers')->insert(
            array(
                array(
                    'producer_name' => 'Altace'
                ),
                array(
                    'producer_name' => 'Amaryl'
                ),
                array(
                    'producer_name' => 'Ambien'
                ),
                array(
                    'producer_name' => 'Ativan'
                ),
                array(
                    'producer_name' => 'Celexa'
                ),
                array(
                    'producer_name' => 'Coumadin'
                ),
                array(
                    'producer_name' => 'Effexor'
                ),
                array(
                    'producer_name' => 'Fosamax'
                ),
                array(
                    'producer_name' => 'Hytrin'
                ),
                array(
                    'producer_name' => 'Imitrex'
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
        Schema::dropIfExists('producers');
    }
}
