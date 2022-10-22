<?php

namespace Uzbek\LaravelPlaymobileClient;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Uzbek\LaravelPlaymobileClient\Exceptions\{AccountLock,
    ContentError,
    EmptyApplication,
    EmptyChannel,
    EmptyContent,
    EmptyEmailAddress,
    EmptyMessageId,
    EmptyOriginator,
    EmptyRecipient,
    EmptyTtl,
    InternalServerError,
    InvalidContent,
    InvalidPriority,
    SyntaxError,
    TooMuchIDs
};

class LaravelPlaymobileClient
{
    private PendingRequest $client;

    private string $originator;

    public function __construct($config)
    {
        $this->originator = $config['originator'];
        $proxy_url = $config['proxy_url'] ?? (($config['proxy_proto'] ?? '') . '://' . ($config['proxy_host'] ?? '') . ':' . ($config['proxy_port'] ?? '')) ?? '';
        $options = (is_string($proxy_url) && str_contains($proxy_url, '://') && strlen($proxy_url) > 12) ? ['proxy' => $proxy_url] : [];

        $this->client = Http::asJson()->baseUrl($config['base_url'])->withOptions($options)
            ->withBasicAuth($config['username'], $config['password']);
    }

    /**
     * @param string $phone
     * @param string $text
     * @return bool
     */
    public function send(string $phone, string $text): bool
    {
        $sms = (new SmsDto($phone, $text, $this->originator))->toArray();

        return $this->client->post('send', ['messages' => [$sms]])
            ->throw(fn($r, $e) => self::catchHttpRequestError($r, $e))->successful();
    }

    public static function catchHttpRequestError($res, $e)
    {
        match ($res->status()) {
            100 => throw new InternalServerError('Internal server error'),
            101 => throw new SyntaxError('Syntax error'),
            102 => throw new AccountLock('Account lock'),
            103 => throw new EmptyChannel('Empty channel'),
            104 => throw new InvalidPriority('Invalid priority'),
            105 => throw new TooMuchIDs('Too much IDs'),
            202 => throw new EmptyRecipient('Empty recipient'),
            204 => throw new EmptyEmailAddress('Empty email address'),
            205 => throw new EmptyMessageId('Empty message-id'),
            401 => throw new EmptyOriginator('Empty originator'),
            402 => throw new EmptyApplication('Empty application'),
            403 => throw new EmptyTtl('Empty ttl'),
            404 => throw new EmptyContent('Empty content'),
            405 => throw new ContentError('Content error'),
            406 => throw new InvalidContent('Invalid content'),
            default => throw $e,
        };
    }
}
