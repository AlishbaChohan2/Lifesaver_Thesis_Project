<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;
    protected $from;

    public function __construct()
    {
        $sid = config('services.twilio.sid');
        $authToken = config('services.twilio.auth_token');
        $this->from = config('services.twilio.from');
        
        $this->client = new Client($sid, $authToken);
    }

    public function sendSms($to, $message)
    {
        try {
            $this->client->messages->create(
                $to, // recipient phone number
                [
                    'from' => $this->from, // your Twilio number
                    'body' => $message, // message to send
                ]
            );

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
