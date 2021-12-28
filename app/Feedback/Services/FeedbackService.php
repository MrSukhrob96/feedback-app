<?php

namespace App\Feedback\Services;

use App\Feedback\Managers\FeedbackFactory;
use App\Feedback\Repositories\DbRepository;
use App\Feedback\Repositories\TxtRepository;
use Illuminate\Support\Facades\Validator;

use Exception;

class FeedbackService
{

    public function addFeedback($request)
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

        try {

            (new FeedbackFactory(new TxtRepository()))->add($request);

            return response([
                "status" => 200,
                "body" => [],
                "message" => "Successfully!"
            ]);
        } catch (Exception $ex) {
            return response([
                "status" => 400,
                "body" => $ex->getMessage(),
                "message" => "Failed form data!"
            ]);
        }
    }
}
