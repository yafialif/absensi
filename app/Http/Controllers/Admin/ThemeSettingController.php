<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\ThemeSetting;
use App\Http\Requests\CreateThemeSettingRequest;
use App\Http\Requests\UpdateThemeSettingRequest;
use Illuminate\Http\Request;

use App\User;


class ThemeSettingController extends Controller {

	/**
	 * Display a listing of themesetting
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $themesetting = ThemeSetting::with("user")->get();

		return view('admin.themesetting.index', compact('themesetting'));
	}

	/**
	 * Show the form for creating a new themesetting
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $user = User::pluck("name", "id")->prepend('Please select', null);

	    
	    return view('admin.themesetting.create', compact("user"));
	}

	/**
	 * Store a newly created themesetting in storage.
	 *
     * @param CreateThemeSettingRequest|Request $request
	 */
	public function store(CreateThemeSettingRequest $request)
	{
	    
		ThemeSetting::create($request->all());

		return redirect()->route(config('quickadmin.route').'.themesetting.index');
	}

	/**
	 * Show the form for editing the specified themesetting.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$themesetting = ThemeSetting::find($id);
	    $user = User::pluck("name", "id")->prepend('Please select', null);

	    
		return view('admin.themesetting.edit', compact('themesetting', "user"));
	}

	/**
	 * Update the specified themesetting in storage.
     * @param UpdateThemeSettingRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateThemeSettingRequest $request)
	{
		$themesetting = ThemeSetting::findOrFail($id);

        

		$themesetting->update($request->all());

		return redirect()->route(config('quickadmin.route').'.themesetting.index');
	}

	/**
	 * Remove the specified themesetting from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		ThemeSetting::destroy($id);

		return redirect()->route(config('quickadmin.route').'.themesetting.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            ThemeSetting::destroy($toDelete);
        } else {
            ThemeSetting::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.themesetting.index');
    }

}
