<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\People;
use App\Http\Requests\CreatePeopleRequest;
use App\Http\Requests\UpdatePeopleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class PeopleController extends Controller {

	/**
	 * Display a listing of people
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $people = People::all();

		return view('admin.people.index', compact('people'));
	}

	/**
	 * Show the form for creating a new people
	 *
     * @return \Illuminate\View\View
	 */
	public function create(People $people)
	{

	    $data = $people->getdata();
	    return view('admin.people.create',compact('data'));
	}

	/**
	 * Store a newly created people in storage.
	 *
     * @param CreatePeopleRequest|Request $request
	 */
	public function store(CreatePeopleRequest $request)
	{
	    $request = $this->saveFiles($request);
		People::create($request->all());

		return redirect()->route(config('quickadmin.route').'.people.index');
	}

	/**
	 * Show the form for editing the specified people.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$people = People::find($id);


		return view('admin.people.edit', compact('people'));
	}

	/**
	 * Update the specified people in storage.
     * @param UpdatePeopleRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdatePeopleRequest $request)
	{
		$people = People::findOrFail($id);

        $request = $this->saveFiles($request);

		$people->update($request->all());

		return redirect()->route(config('quickadmin.route').'.people.index');
	}

	/**
	 * Remove the specified people from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		People::destroy($id);

		return redirect()->route(config('quickadmin.route').'.people.index');
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
            People::destroy($toDelete);
        } else {
            People::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.people.index');
    }

}
