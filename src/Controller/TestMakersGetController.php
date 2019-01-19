<?php
declare(strict_types = 1);

namespace OatApi\Controller;

use Psr\Http\Message\ResponseInterface;

final class TestMakersGetController
{
    public function __invoke()
    {
        $response = $this->response->withHeader('Content-Type', 'application/json');
        $response->geBody()
            ->write("");

        return $response;
    }
}
