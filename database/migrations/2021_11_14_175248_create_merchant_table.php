<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant', function (Blueprint $table) {
           
            $table->increments('id');  
            $table->string('name');     
            $table->string('uid')->unique();                                    
            $table->text('domain')->nullable();
            $table->text('meta')->nullable();   
            $table->decimal('credit')->default(0);    
            $table->smallInteger('status')->default(getConfig('merchant.status.active'));   
            $table->softDeletes();                
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
        Schema::dropIfExists('merchant');
    }
}
