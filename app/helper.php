<?php

use App\Models\ActivityLog;

function addToActivity($user,$action)
{
    $activiy = new ActivityLog();
    $activiy->user_id = $user;
    $activiy->activity = $action;
    $activiy->save();
}
