<?php

use App\Models\User;
use App\Enums\UserType;

if (!function_exists('getClientUsers')) {
    function getClientUsers() {
        return User::where('type','=', UserType::CLIENT)->get();
    }
}
