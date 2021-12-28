<?php

namespace App\Feedback\Repositories;

use App\Feedback\Managers\Interfaces\FeedbackFactoryInterface;

class TxtRepository implements FeedbackFactoryInterface
{

    public const LOG_FILE = "test.txt";

    public function add($request)
    {
        file_put_contents(self::LOG_FILE, $this->getText($request) . PHP_EOL, FILE_APPEND);
    }

    private function getText($request)
    {
        return "name={$request->name}@@@phone={$request->phone}@@@message={$request->message}";
    }

    public function getFeedback()
    {
        //...
    }
}
