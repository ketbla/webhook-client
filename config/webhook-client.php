<?php

return [
    'configs' => [
        [
            'name' => 'datadog-test',
            'signing_secret' => 'secret-for-webhook-sending-app-1',
            'signature_header_name' => 'Signature-for-app-1',
            'signature_validator' => \App\WebhookClient\DatadogSignatureValidator::class,
            'webhook_profile' => \App\WebhookClient\ProcessEverythingWebhookProfile::class,
            'webhook_response' => null,
            'webhook_model' => \Spatie\WebhookClient\Models\WebhookCall::class,
            'process_webhook_job' => \App\Jobs\DatadogWebhookJob::class,
        ]
    ],
];
