<?php

namespace AppBundle;

use Behat\Gherkin\Node\PyStringNode;
use Symfony\Bundle\FrameworkBundle\Client;

trait HttpRequestTrait
{
    /**
     * @param string $method
     * @param string $resource
     * @param array $headers
     * @param PyStringNode|string|null $content
     */
    protected function request($method, $resource, array $headers = [], $content = null)
    {
        $content = $content instanceof PyStringNode ? $content->getRaw() : $content;
        $content = implode('&', explode("\n", $content));
        parse_str($content, $params);

        $server = $this->createServerArray($headers);

        $this->getClient()->request($method, $this->locatePath($resource), $params, [], $server);
    }

    /**
     * @param string $resource
     *
     * @return string
     */
    protected function prepareResource($resource)
    {
        return preg_replace('/^(https?\:\/\/[^\/]+)(\/[^\/]+\.php)?/', '$1', $resource);
    }

    /**
     * @param array $headers
     *
     * @return array
     */
    protected function createServerArray(array $headers = [])
    {
        $server = [];
        $nonPrefixed = ['CONTENT_TYPE'];

        foreach ($headers as $name => $value) {
            $headerName = strtoupper(str_replace('-', '_', $name));
            $headerName = in_array($headerName, $nonPrefixed) ? $headerName : 'HTTP_'.$headerName;
            $server[$headerName] = $value;
        }

        return $server;
    }

    /**
     * @return Client
     */
    protected function getClient()
    {
        $driver = $this->getSession()->getDriver();

        return $driver->getClient();
    }

    /**
     * @param string $string
     */
    protected function printDebug($string)
    {
        echo "\n\033[36m|  " . strtr($string, ["\n" => "\n|  "]) . "\033[0m\n\n";
    }
}