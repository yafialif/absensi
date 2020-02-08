<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreatePeopleTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('people',function(Blueprint $table){
            $table->increments("id");
            $table->string("pid")->nullable();
            $table->string("nama")->nullable();
            $table->string("foto")->nullable();
            $table->string("title")->nullable();
            $table->string("kepala_keluarga")->nullable();
            $table->string("alamat")->nullable();
            $table->string("lng")->nullable();
            $table->string("lat")->nullable();
            $table->date("tgl_lahir")->nullable();
            $table->string("tlpn")->nullable();
            $table->string("jenis_kelamin")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('people');
    }

}