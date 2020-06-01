<?php

namespace App\Jobs;

use \Spatie\WebhookClient\ProcessWebhookJob as SpatieProcessWebhookJob;
use Illuminate\Support\Facades\Log;


class DatadogWebhookJob extends SpatieProcessWebhookJob
{
    public function handle()
    {
        $this->webhookCall; // contains an instance of `WebhookCall`

        $payload = json_decode($this->webhookCall, true);
        Log::alert($payload);
    }
}
