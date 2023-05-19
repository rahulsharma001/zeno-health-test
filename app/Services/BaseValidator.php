<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class BaseValidator
{

    protected $rules = [];
    protected $messages = [];

    /**
     * @param        $data
     * @param string $ruleset
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validate($data, $ruleset = 'create')
    {
        // We allow collections, so transform to array.
        if ($data instanceof Collection) {
            $data = $data->toArray();
        }

        // Load the correct ruleset.
        $rules = $this->rules[ $ruleset ];

        // Load the correct message set.
        $messages = $this->messages[ $ruleset ];

        return Validator::make($data, $rules, $messages)->validate();
    }
}
