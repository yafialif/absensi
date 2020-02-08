<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\UserApp;
use App\Http\Requests\CreateUstadRequest;
use App\Http\Requests\UpdateUstadRequest;
use Illuminate\Http\Request;

use App\Category;


class UstadController extends Controller {

	/**
	 * Display a listing of ustad
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $ustad = UserApp::with("category")->get();

		return view('admin.ustad.index', compact('ustad'));
	}

	/**
	 * Show the form for creating a new ustad
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $category = Category::pluck("nama_category", "id")->prepend('Please select', null);

	    
	    return view('admin.ustad.create', compact("category"));
	}

	/**
	 * Store a newly created ustad in storage.
	 *
     * @param CreateUstadRequest|Request $request
	 */
	public function store(CreateUstadRequest $request)
	{
	    $post = new UserApp();
	    $post->username = $request->id_ustad;
	    $post->nama     =  $request->nama_ustad;
        $post->category_id =  $request->category_id;
        $post->password     = $request->password_ustad;
        $post->deskripsi    = $request->deskripsi;
        $post->user_category     = 1;
        $post->save();

//		UserApp::create($request->all());

		return redirect()->route(config('quickadmin.route').'.ustad.index');
	}

	/**
	 * Show the form for editing the specified ustad.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$ustad = UserApp::find($id);
	    $category = Category::pluck("nama_category", "id")->prepend('Please select', null);

	    
		return view('admin.ustad.edit', compact('ustad', "category"));
	}

	/**
	 * Update the specified ustad in storage.
     * @param UpdateUstadRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateUstadRequest $request)
	{
		$ustad = UserApp::findOrFail($id);

        

		$ustad->update($request->all());

		return redirect()->route(config('quickadmin.route').'.ustad.index');
	}

	/**
	 * Remove the specified ustad from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		UserApp::destroy($id);

		return redirect()->route(config('quickadmin.route').'.ustad.index');
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
            UserApp::destroy($toDelete);
        } else {
            UserApp::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.ustad.index');
    }

}
