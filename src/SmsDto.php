<?php

namespace Uzbek\LaravelPlaymobileClient;

use Illuminate\Support\Str;

class SmsDto
{
    private string $messageId;

    private bool $flat = false;

    private bool $long = false;

    public function __construct(
        private readonly string $recipient,
        private readonly string $text,
        private readonly string $originator,
    ) {
        $this->messageId = Str::uuid()->toString();
    }

    public function flat(): self
    {
        $this->flat = true;

        return $this;
    }

    public function toArray(): array
    {
        if ($this->flat) {
            return ['messageId' => $this->messageId, 'originator' => $this->originator, 'recipient' => $this->recipient, 'text' => $this->text];
        }

        return [
            'recipient' => $this->recipient,
            'message-id' => $this->messageId,
            'sms' => [
                'originator' => $this->originator,
                'content' => ['text' => $this->long ? $this->text : Str::limit($this->text, 160)],
            ],
        ];
    }
}
