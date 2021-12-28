<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Feedback\Managers\FeedbackFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|min:3',
            'phone'   => 'required|max:12|min:12|regex:/(992)[0-9]/',
            "message" => "required|max:250|min:25"
        ]);

        if ($validator->fails()) {
            return response([
                "status" => 400,
                "body" => $validator->errors(),
                "message" => "Failed form data!"
            ]);
        }

        FeedbackFactory::addFeedback($request, "txt");

        return response([
            "status" => 200,
            "body" => [],
            "message" => "Successfully!"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
