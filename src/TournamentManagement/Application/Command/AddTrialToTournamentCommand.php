<?php
declare(strict_types=1);

namespace App\TournamentManagement\Application\Command;

use App\TournamentManagement\Domain\ValueObject\TournamentId;
use App\TournamentManagement\Domain\ValueObject\TrialId;

class AddTrialToTournamentCommand
{
    public function __construct(
        public TournamentId $tournamentId,
        public TrialId $trialId,
        public string $name,
        public ?string $description = null
    ) {}
}
