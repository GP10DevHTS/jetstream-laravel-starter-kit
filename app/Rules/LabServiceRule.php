<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class LabServiceRule implements ValidationRule
{
    protected $values;
    public function __construct(array $values)
    {
        $this->values = $values;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!in_array($value, $this->values)) {
            $fail("The lab service must be unique.");
        }
    }
}
