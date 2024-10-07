<?php
declare(strict_types=1);

namespace App\TournamentManagement\Application\Command;

class CreateTournamentCommand
{
    public function __construct(
        public string $name,
        public \DateTimeInterface $startDate,
        public \DateTimeInterface $endDate
    ) {}
}
