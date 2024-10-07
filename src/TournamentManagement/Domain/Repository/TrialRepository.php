<?php
declare(strict_types=1);

namespace App\TournamentManagement\Domain\Repository;

use App\TournamentManagement\Domain\Entity\Trial;
use App\TournamentManagement\Domain\ValueObject\TrialId;

interface TrialRepository
{
    public function save(Trial $trial): void;
    public function findById(TrialId $trialId): ?Trial;
    public function remove(Trial $trial): void;
}
