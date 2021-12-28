<?php

namespace App\Feedback\Managers\Interfaces;

use Illuminate\Http\Request;

interface  FeedbackFactoryInterface
{
    public function add(Request $request);
}
