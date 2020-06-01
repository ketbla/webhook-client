<?php
namespace App\WebhookClient;

use Illuminate\Http\Request;
use Spatie\WebhookClient\WebhookConfig;

interface RespondsToWebhook
{
    public function respondToValidWebhook(Request $request, WebhookConfig $config)
    {
        
    };
}