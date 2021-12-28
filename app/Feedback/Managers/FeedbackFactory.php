<?php

namespace App\Feedback\Managers;

use App\Feedback\Managers\Interfaces\FeedbackFactoryInterface;
use App\Feedback\Repositories\TxtRepository;

class  FeedbackFactory
{
    public $feedbackRepository;

    public function __construct(FeedbackFactoryInterface $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    public function add($request)
    {
        $this->feedbackRepository->add($request);
    }
}
