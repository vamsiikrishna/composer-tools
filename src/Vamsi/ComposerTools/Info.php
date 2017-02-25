<?php

namespace Vamsi\ComposerTools;

class Info
{
    private $path;

    private $decoded;

    private $packages;


    public function __construct($path)
    {
        $this->path = $path;
    }

    public function parse()
    {
        $this->decoded = json_decode(file_get_contents($this->path), true);
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getDecoded()
    {
        return $this->decoded;
    }

    /**
     * @param mixed $decoded
     */
    public function setDecoded($decoded)
    {
        $this->decoded = $decoded;
    }

    /**
     * @return mixed
     */
    public function getHash()
    {
        return array_key_exists('content-hash', $this->decoded) ? $this->decoded['content-hash'] : null;

    }

    public function getPackages()
    {
        if ($this->packages) {
            return $this->packages;
        }

        $this->packages = new BasicPackageCollection();

        foreach ($this->decoded['packages'] as $info) {
            $this->packages[] = BasicPackage::factory($info);
        }

        return $this->packages;

    }


}
