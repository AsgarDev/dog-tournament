<?php
declare(strict_types=1);

namespace App\TournamentManagement\Domain\ValueObject;

use Symfony\Component\Uid\Uuid;

readonly final class TournamentId
{
    private function __construct(private string $id)
    {
    }

    public static function generate(): self
    {
        return new self(Uuid::v4()->toString());
    }

    public static function fromString(string $id): self
    {
        return new self($id);
    }

    public function __toString(): string
    {
        return $this->id;
    }
}
