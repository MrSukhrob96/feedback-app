<?php

namespace App\Feedback\Repositories;

use App\Feedback\Repositories\Interfaces\FeedbackRepositoryInterface;


class TxtRepository implements FeedbackRepositoryInterface
{

    private $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function addFeedback($request)
    {
        $txt = "name={$request->name}@@@phone={$request->phone}@@@message={$request->message}";

        file_put_contents($this->file, $txt . PHP_EOL, FILE_APPEND);
    }

    public function getFeedback()
    {
        //...
    }

}
