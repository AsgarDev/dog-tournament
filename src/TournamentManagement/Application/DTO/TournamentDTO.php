<?php
declare(strict_types=1);

namespace App\TournamentManagement\Application\DTO;

class TournamentDTO
{
    public string $name;
    public \DateTimeInterface $startDate;
    public \DateTimeInterface $endDate;
}
