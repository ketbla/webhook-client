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

        $alert['severity'] = $payload['payload']['alert_type'];
        $alert['tags'] = [];

        foreach(explode(',',$payload['payload']['tags']) as $tag)
        {
            $alert['tags'][explode(':',$tag)[0]] = explode(':',$tag)[1] ?? null;
        }
        $alert['title'] = preg_replace(
            array('/(.+}])/'),
            array(''),
            $payload['payload']['title']
        );
        $alert['object'] = $alert['tags']['host'] ?? $payload['payload']['hostname'];

        $alert['node'] = $alert['tags']['project'].'_'.$alert['tags']['system'].'-appid-'.$alert['tags']['application_id'];
        $alert['category'] = $alert['tags']['service_owner_support'];

        Log::alert($alert);
    }
}
