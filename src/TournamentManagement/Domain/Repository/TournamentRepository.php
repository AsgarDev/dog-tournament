<?php
declare(strict_types=1);

namespace App\TournamentManagement\Domain\Repository;

use App\TournamentManagement\Domain\Entity\Tournament;
use App\TournamentManagement\Domain\ValueObject\TournamentId;

interface TournamentRepository
{
    public function save(Tournament $tournament): void;
    public function findById(TournamentId $id): ?Tournament;
    public function findAll(): array;
}
