<?php
declare(strict_types=1);

namespace App\TournamentManagement\Domain\Entity;

use App\TournamentManagement\Domain\ValueObject\TrialId;

class Trial
{
    public function __construct(
        private TrialId $id,
        private string $name,
        private ?string $description,
        private Tournament $tournament
    ) {
    }

    public function getId(): TrialId
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getTournament(): Tournament
    {
        return $this->tournament;
    }
}
