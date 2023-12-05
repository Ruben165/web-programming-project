<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class ValidPhone implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $phoneRegex = "/^[0-9]{12}$/";

        if (!preg_match($phoneRegex, $value)) {
            $fail("The $attribute must be a valid phone number.");
        }
    }
}
