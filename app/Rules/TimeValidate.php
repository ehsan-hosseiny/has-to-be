<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class TimeValidate implements Rule
{

    /**
     * TimeValidate constructor.
     * @param array $request
     */
    public function __construct(private array $request)
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (Carbon::parse($this->request['cdr']['timestampStart']) > Carbon::parse($this->request['cdr']['timestampStop'])) {
            return false;
        }
        return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'start time should before stop time';
    }
}
