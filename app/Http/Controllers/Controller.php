<?php

namespace App\Http\Controllers;

use App\Models\Setting;

abstract class Controller
{
    /**
     * Get a setting value by key.
     */
    protected function setting($key, $default = '')
    {
        return Setting::getValue($key, $default);
    }

    /**
     * Flash a success message to the session.
     */
    protected function flashSuccess($message)
    {
        session()->flash('success', $message);
    }

    /**
     * Flash an error message to the session.
     */
    protected function flashError($message)
    {
        session()->flash('error', $message);
    }
}
