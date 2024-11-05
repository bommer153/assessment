<?php

if (!function_exists('formatDate')) {
    function formatDate($date, $format = 'F j, Y, g:i a')
    {
        return \Carbon\Carbon::parse($date)->format($format);
    }
}