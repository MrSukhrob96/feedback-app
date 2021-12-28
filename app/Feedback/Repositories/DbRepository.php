<?php

namespace App\Feedback\Repositories;

use App\Models\Feedback;
use App\Feedback\Managers\Interfaces\FeedbackFactoryInterface;

class DbRepository implements FeedbackFactoryInterface
{

    public $feedbackModel;

    public function __construct()
    {
        $this->feedbackModel = new Feedback();
    }

    public function add($request)
    {
        $this->feedbackModel->create(array(
            "name" => $request->name,
            "phone" => $request->phone,
            "message" => $request->message
        ));
    }

    public function getFeedback()
    {
        //...
    }
}
