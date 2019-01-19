<?php
declare(strict_types = 1);

namespace OatAPI\Domain;

interface TestMakerRepository
{
    public function all(): TestMakers;
    public function search(TMId $id): ?TestMaker;
}
