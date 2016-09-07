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
    private $aps;

    /**
     * @var array
     */
    private $external;

    /**
     * Construct.
     * @param string $title
     * @param string $body
     * @param string $deepLink
     * @param array $aps
     * @param array $external
     */
    public function __construct($title, $body, $deepLink = null, $aps = array(), $external = array())
    {
        $this->title = $title;
        $this->body = $body;
        $this->deepLink = $deepLink;
        $this->aps = $aps;
        $this->external = $external;
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

        if ( !empty( $this->aps ) )
        {
            $payload[ 'aps' ] += $this->aps;
        }
        if ( !empty( $this->external ) )
        {
            $payload = array_merge( $payload, $this->external );
        }

        return $payload;
    }
}
