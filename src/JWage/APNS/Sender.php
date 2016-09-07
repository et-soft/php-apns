<?php

namespace JWage\APNS;

class Sender
{
    /**
     * @var \JWage\APNS\Client
     */
    private $client;

    /**
     * Construct.
     *
     * @param \JWage\APNS\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Sends a safari website push notification to the given deviceToken.
     * @param string $deviceToken
     * @param string $title
     * @param string $body
     * @param string $deepLink
     * @param array $aps
     * @param array $external
     * @return int
     */
    public function send($deviceToken, $title, $body, $deepLink = null, $aps = array(), $external = array())
    {
        return $this->client->sendPayload(
            $deviceToken, $this->createPayload($title, $body, $deepLink, $aps, $external)
        );
    }

    /**
     * Creates a Payload instance.
     * @param string $title
     * @param string $body
     * @param string $deepLink
     * @param array $aps
     * @param array $external
     * @return Payload
     */
    private function createPayload($title, $body, $deepLink = null, $aps = array(), $external = array())
    {
        return new Payload($title, $body, $deepLink, $aps, $external);
    }
}
