<?php

namespace BookingHotel\Shares;

trait TrainGetTokenHeader
{
    public function getTokenHeaders(): string
    {
        $token = '';
        $headers = apache_request_headers();
        if (isset($headers['token'])) {
            $token = $headers['token'];
        }
        return $token;
    }
}