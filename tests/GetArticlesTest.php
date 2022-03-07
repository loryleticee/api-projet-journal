<?php
// namespace App\Tests;

// use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
// use Symfony\Component\HttpFoundation\Response;

// class GetArticles extends WebTestCase
// {
//     public function testGetArticles(): void
//     {
//         $client = self::createClient();
//         $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2NDYyOTYwODQsImV4cCI6MTY0NjI5OTY4NCwicm9sZXMiOlsiUk9MRV9VU0VSIl0sInVzZXJuYW1lIjoibG9yeUBsb3J5LmZyIiwiZW1haWwiOiJsb3J5QGxvcnkuZnIifQ.MhkJiCruN-W_BOjc0rB_HDoyuxAwvSmBbDPU-66XNmzwxoMHbtO0VBUMasNDNIHZl59b6ICDLZGS6_jO8oMX6wLSTk4M_YtjGBcxpwpHeMi4wZp46iI7vmRzj8PV6NUawzVoB9w3iDVcoB3Q-KerzVZw_I58yyBuqxmA5TIiq-Hx8CPkuIwcua2D2RAvqm9jlkG1ElC4NfgSNhAEGpjBDjoBYAoy4CWmFo8-am_Xu-0eyBrqBLGu0JRQyEdAF0QIkrunMtTPIpQPNKocI2nPkCbqc2jk7m0L8j0mipbt79kqK9KqVG6QQRGxktp_8BwaE1EvYLVKbFpXadRIfEx-UA";
//         $crawler =  $client->request('GET', "/api/articles", [], [], [
//             'HTTP_AUTHORIZATION' => "Bearer $token",
//             'CONTENT_TYPE' => 'application/ld+json',
//             'HTTP_ACCEPT' => 'application/ld+json'
//    ]);

//         self::assertResponseStatusCodeSame(Response::HTTP_OK);
//     }
// }
