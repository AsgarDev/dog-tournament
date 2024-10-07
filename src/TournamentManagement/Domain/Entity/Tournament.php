<?php
declare(strict_types=1);

namespace App\TournamentManagement\Domain\Entity;

use App\TournamentManagement\Domain\ValueObject\TournamentId;

readonly class Tournament
{
    private string $id;

    private function __construct(
        private string $name,
        private \DateTimeInterface $startDate,
        private \DateTimeInterface $endDate,
    ) {
        $this->id = TournamentId::generate()->__toString();
    }

    public static function create(string $name, \DateTimeInterface $startDate, \DateTimeInterface $endDate): self
    {
        return new self($name, $startDate, $endDate);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStartDate(): \DateTimeInterface
    {
        return $this->startDate;
    }

    public function getEndDate(): \DateTimeInterface
    {
        return $this->endDate;
    }
}
