<?php

declare(strict_types=1);

namespace App\Tests;

use App\Tests\Functions\AbstractEntrypoint;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// use PHPUnit\Framework\TestCase;

class GetUserTest extends AbstractEntrypoint
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testGetArticle()
    {
        $response =$this->getResponseFromRequest(Request::METHOD_POST, "/api/articles", '', [], true);
       
        $content = $response->getContent();
       
        $contentDecoded = json_decode($content);
        var_dump($contentDecoded);
        die('---END---');
        self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
    }
}
