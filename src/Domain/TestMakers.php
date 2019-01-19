<?php
declare(strict_types = 1);

namespace CodelyTv\Context\Video\Module\User\Domain;

use OatAPI\Shared\Domain\Collection;
use function Lambdish\Phunctional\each;

final class TestMakers extends Collection
{
    protected function type(): string
    {
        return TestMaker::class;
    }
}
