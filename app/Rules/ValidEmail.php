<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class ValidEmail implements InvokableRule
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
        $emailRegex = "/^[a-zA-Z0-9_.+-]+@gmail.com$/";

        if (!preg_match($emailRegex, $value)) {
            $fail("The $attribute must be a valid gmail address.");
        }
    }
}
