<?php

namespace JWage\APNS;

class Payload
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $body;

    /**
     * @var string
     */
    private $deepLink;

    /**
     * @var array
     */
    private $extend;

    /**
     * Construct.
     * @param string $title
     * @param string $body
     * @param string $deepLink
     * @param array $extend
     */
    public function __construct($title, $body, $deepLink = null, $extend = array())
    {
        $this->title = $title;
        $this->body = $body;
        $this->deepLink = $deepLink;
        $this->extend = $extend;
    }

    /**
     * Gets payload array structure.
     *
     * @return array $payload
     */
    public function getPayload()
    {
        $payload = array(
            'aps' => array(
                'alert' => array(
                    'title' => $this->title,
                    'body' => $this->body,
                ),
                'url-args' => array(
                    $this->deepLink,
                ),
            ),
        );

        if ( !empty( $this->extend ) )
        {
            $payload = array_merge_recursive( $payload, $this->extend );
        }

        return $payload;
    }
}
