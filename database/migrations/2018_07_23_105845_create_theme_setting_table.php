<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateThemeSettingTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('themesetting',function(Blueprint $table){
            $table->increments("id");
            $table->integer("user_id")->references("id")->on("user")->nullable();
            $table->string("navbarbg")->nullable();
            $table->string("headerbg")->nullable();
            $table->string("menucaption")->nullable();
            $table->string("bgpattern")->nullable();
            $table->string("activeitemtheme")->nullable();
            $table->string("frametype")->nullable();
            $table->string("layout_type")->nullable();
            $table->string("layout_width")->nullable();
            $table->string("menu_effect_desktop")->nullable();
            $table->string("menu_effect_phone")->nullable();
            $table->string("menu_icon_style")->nullable();
            $table->string("DropDownIconStyle")->nullable();
            $table->string("FixedNavbarPosition")->nullable();
            $table->string("FixedHeaderPosition")->nullable();
            $table->string("VerticalSubMenuItemIconStyle")->nullable();
            $table->string("defaultVerticalMenu")->nullable();
            $table->string("onToggleVerticalMenu")->nullable();
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
        Schema::drop('themesetting');
    }

}