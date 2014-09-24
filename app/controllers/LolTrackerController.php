<?php

class LolTrackerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /loltracker
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /loltracker/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('register');
	}

    /**
     *Register new user
     */
    public function login()
    {
        return View::make('login');
    }

	/**
	 * Store a newly created resource in storage.
	 * POST /loltracker
	 *
	 * @return Response
	 */
	public function store()
	{
        $validator = Validator::make(
            array(
                'username' => Input::get('username'),
                'password' => Input::get('password'),
                'email' => Input::get('email'),
                'firstname' => Input::get('firstname'),
                'lastname' => Input::get('lastname'),
                'day' => Input::get('day'),
                'year' => Input::get('year')

            ),
            array(
                'username' => 'Required|Min:6',
                'password'=> 'Required|Min:6',
                'email' => 'required|email|Min:3|Max:80',
                'firstname' => 'required',
                'lastname' => 'required|alpha',
                'day' => 'required|numeric',
                'year' => 'required|numeric',
            )
        );
        if ($validator->fails()) {

            return Redirect::back()->with(['errors' => $validator->messages()]);
        }

        return Input::all();

	}

	/**
	 * Display the specified resource.
	 * GET /loltracker/{id}
	 *
	 *
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /loltracker/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /loltracker/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /loltracker/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}