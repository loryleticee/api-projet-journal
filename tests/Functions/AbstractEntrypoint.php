<?php

declare(strict_types=1);

namespace App\Tests\Functions;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractEntrypoint extends WebTestCase
{
    protected array $requestSetting = ["ACCEPT" => "application/json", "CONTENT_TYPE" => "application/json"];
    protected string $noToken = "";
    protected string $noYourRessource = "";
    protected string $login_credentials = '{"password":"lory", "username":"lory@lory.fr"}';

    public function getResponseFromRequest(string $method, string $uri, string $playload = "", $parameter = [], bool $withAuthentification = false): Response
    {
        $client = $this->createAuthClient($withAuthentification);
        $client->request(
            $method,
            $uri,
            $parameter,
            [],
            $this->requestSetting,
            $playload
        );
        return $client->getResponse();
    }

    protected function createAuthClient(bool $withAuthentification = false): KernelBrowser
    {
        $client = self::createClient();
        if (!$withAuthentification) {
            return $client;
        }

        $client->request(
            Request::METHOD_POST,
            "/api/login_check",
            [],
            [],
            $this->requestSetting,
            $this->login_credentials
        );
        
        $ResponseGetTokenRequest = json_decode($client->getResponse()->getContent(), true);
        $client->setServerParameter('HTTP_AUTHORIZATION', $ResponseGetTokenRequest["token"]);
        
        return $client;
    }
}
