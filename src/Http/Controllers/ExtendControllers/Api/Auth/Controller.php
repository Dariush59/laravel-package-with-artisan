<?php

namespace Phoenix\Expenses\Http\Controllers\ExtendControllers\Api\Auth;


use Illuminate\Http\Request;
use Phoenix\Expenses\Http\Controllers\Controller as MainController;

class Controller extends MainController
{
    public function validate(Request $request, array $rules,
                             array $messages = [], array $customAttributes = [])
    {
        return $this->getValidationFactory()
            ->make($request->all(), $rules, $messages, $customAttributes);
    }

}
