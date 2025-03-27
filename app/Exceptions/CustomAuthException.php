<?php

namespace App\Exceptions;

use Exception;

class CustomAuthException extends Exception
{
    public function render($request)
    {
        return redirect()->route('login')
            ->with('error', $this->getMessage());
    }
}