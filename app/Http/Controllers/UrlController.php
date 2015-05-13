<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Str;
use Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class UrlController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $url = \App\Url::all();
        $id = Auth::user()->id;
        $list = array();
        foreach($url as $key => $value)
        {
           if($value->userid == $id)
            {
                $list[] = $value;
            }
        } 
        return view('index')->with(array('urls' => $list, 'id' => $id));
        
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $url = \App\Url::where('url','=',Input::get('url'))->first();

        if($url)
        {
            $hash = $url->hash;
            return view('redirect')->with(array('hash' => $hash));
        }
        else
        {

            $hash = Str::random(6);
            $url = Input::get('url');
            if(strpos($url, "http://") !== true)
            {
                $url = "http://" . $url;
            }
            \App\Url::create(array(
                'userid' => Auth::user()->id,
                'url' => $url,
                'hash' => $hash,
           
                ));
        
            return view('redirect')->with(array('hash' => $hash));
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        $url = \App\Url::find($id);
        $url->delete();
        return Redirect::to('home');
	}

}
