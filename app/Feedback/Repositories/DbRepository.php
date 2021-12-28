<?php

namespace App\Feedback\Repositories;

use App\Feedback\Repositories\Interfaces\FeedbackRepositoryInterface;
use App\Models\Feedback;


class DbRepository implements FeedbackRepositoryInterface
{

    public $feedbackModel;

    public function __construct()
    {
        $this->feedbackModel = new Feedback();
    }

    public function addFeedback($request)
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
