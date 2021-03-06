<?php

namespace Violin\Rules;

use Violin\Contracts\RuleContract;

class RequiredRule implements RuleContract
{
    public function run($value, $input, $args)
    {
        $value = preg_replace('/^[\pZ\pC]+|[\pZ\pC]+$/u', '', $value);
        
        if($value === '0'){
			return true;
		}
		
        return !empty($value);
    }

    public function error()
    {
        return '{field} is required.';
    }

    public function canSkip()
    {
        return false;
    }
}
