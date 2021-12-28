<?php

namespace App\Feedback\Managers;

use App\Feedback\Repositories\Interfaces\FeedbackRepositoryInterface;
use App\Feedback\Repositories\TxtRepository;
use App\Feedback\Repositories\DbRepository;

class  FeedbackFactory
{

    public $feedbackRepository;

    public const FILE = "test.txt";

    public function __construct(
        FeedbackRepositoryInterface $feedbackRepository
    ) {
        $this->feedbackRepository = $feedbackRepository;
    }

    public static function addFeedback($request, $type)
    {
        switch ($type) {
            case "txt": {
                    (new TxtRepository(self::FILE))->addFeedback($request);
                }
            case "db": {
                    (new DbRepository())->addFeedback($request);
                }
            default: {
                }
        }
    }
}
