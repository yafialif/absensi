<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class ThemeSetting extends Model {

    

    

    protected $table    = 'themesetting';
    
    protected $fillable = [
          'user_id',
          'navbarbg',
          'headerbg',
          'menucaption',
          'bgpattern',
          'activeitemtheme',
          'frametype',
          'layout_type',
          'layout_width',
          'menu_effect_desktop',
          'menu_effect_phone',
          'menu_icon_style',
          'DropDownIconStyle',
          'FixedNavbarPosition',
          'FixedHeaderPosition',
          'VerticalSubMenuItemIconStyle',
          'defaultVerticalMenu',
          'onToggleVerticalMenu'
    ];
    

    public static function boot()
    {
        parent::boot();

        ThemeSetting::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    
    
    
}