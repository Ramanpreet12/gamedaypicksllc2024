<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WholeNumber implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Check if the value is numeric and does not contain a decimal point
        return is_numeric($value) && floor($value) == $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a whole number like: $75, $100, $150 etc.';
    }
}
