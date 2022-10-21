<?php

namespace Uzbek\LaravelPlaymobileClient;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class LaravelPlaymobileClient
{
    private PendingRequest $client;

    private string $originator;

    public function __construct($config)
    {
        $this->originator = $config['originator'];
        $proxy_url = $config['proxy_url'] ?? (($config['proxy_proto'] ?? '').'://'.($config['proxy_host'] ?? '').':'.($config['proxy_port'] ?? '')) ?? '';
        $options = (is_string($proxy_url) && str_contains($proxy_url, '://') && strlen($proxy_url) > 12) ? ['proxy' => $proxy_url] : [];

        $this->client = Http::asJson()->baseUrl($config['base_url'])->withOptions($options)
            ->withBasicAuth($config['username'], $config['password']);
    }

    /**
     * @param  string  $phone
     * @param  string  $text
     * @return bool
     */
    public function send(string $phone, string $text): bool
    {
        $sms = (new SmsDto($phone, $text, $this->originator))->toArray();

        return $this->client->post('send', ['messages' => [$sms]])->successful();
    }
}
