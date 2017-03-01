<?php

namespace CaptainHook\Chargify;

use Psr\Http\Message\ServerRequestInterface;

final class Webhook
{
    /**
     *
     * @var int
     */
    private $id;

    /**
     *
     * @var string
     */
    private $event;

    /**
     *
     * @var array
     */
    private $payload;

    /**
     *
     * @param int $id
     * @param string $event
     * @param array $payload
     */
    public function __construct(int $id, string $event, array $payload)
    {
        $this->id = $id;
        $this->event = $event;
        $this->payload = $payload;
    }

    /**
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     *
     * @return string
     */
    public function getEvent(): string
    {
        return $this->event;
    }

    /**
     *
     * @return array
     */
    public function getPayload(): array
    {
        return $this->payload;
    }

    /**
     *
     * @param RequestInterface $request
     *
     * @return Webhook
     */
    static public function fromRequest(ServerRequestInterface $request): Webhook
    {
        $body = $request->getParsedBody();

        return new self((int) $body['id'], $body['event'], $body['payload']);
    }
}
