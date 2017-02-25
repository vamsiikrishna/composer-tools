<?php

namespace Vamsi\ComposerTools;

use DateTime;

class BasicPackage
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var DateTime
     */
    private $time;


    public function __construct($name, $time)
    {
        $this->name = $name;
        $this->time = $time;
    }

    public static function factory(array $info)
    {
        return new self(
            $info['name'],
            isset($info['time']) ? new DateTime($info['time']) : null
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param DateTime $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }
}