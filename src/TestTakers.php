<?php
declare(strict_types=1);

namespace OatAPI;

use Psr\Http\Message\ResponseInterface;

class TestTakers
{
    private $jsonData;
    private $response;

    public function __construct(array $data, ResponseInterface $response)
    {
        $this->jsonData = $data;
        $this->response = $response;
    }

    public function __invoke(): ResponseInterface
    {
        $response = $this->response->withHeader('Content-Type', 'text/html');
        $response->getBody()
            ->write("<html><head></head><body>Hello, {$this->jsonData['d']} world!</body></html>");

        return $response;
    }
}
