<?php
declare(strict_types = 1);

namespace OatAPI\Shared\Domain\ValueObject;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid
{
    private $data;
    
    public function __construct(string $idValue)
    {
        $this->guard($idValue);
        $this->data = $idValue;
    }
    
    public static function random(): self
    {
        return new self(RamseyUuid::uuid4()->toString());
    }
    
    public function data(): string
    {
        return $this->data;
    }
    
    private function check($id): void
    {
        if (!RamseyUuid::isValid($id)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, is_scalar($id) ? $id : gettype($id))
            );
        }
    }

    public function __toString()
    {
        return $this->data();
    }
}
