<?php

namespace App\WebhookClient;

use Spatie\WebhookClient\WebhookProfile\WebhookProfile;
use Illuminate\Http\Request;

class ProcessEverythingWebhookProfile implements WebhookProfile
{
    public function shouldProcess(Request $request): bool
    {
        return true;
    }
}
