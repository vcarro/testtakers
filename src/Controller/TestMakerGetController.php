<?php
declare(strict_types = 1);

namespace OatApi\Controller;

use Psr\Http\Message\ResponseInterface;

final class TestMakerGetController
{
    public function __invoke(string $id)
    {
        $response = $this->response->withHeader('Content-Type', 'text/html');
        $response->getBody()
            ->write("<html><head></head><body>Hello, {$this->jsonData['d']} world!</body></html>");

        return $response;

        //return $this->ask(new FindUserQuery($id));
    }
}
