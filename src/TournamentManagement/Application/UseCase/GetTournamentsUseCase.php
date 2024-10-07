<?php
declare(strict_types=1);

namespace App\TournamentManagement\Application\UseCase;

use App\TournamentManagement\Domain\Repository\TournamentRepository;
use App\TournamentManagement\Domain\Entity\Tournament;
use App\TournamentManagement\Domain\ValueObject\TournamentId;

readonly class GetTournamentsUseCase
{
    public function __construct(private TournamentRepository $tournamentRepository)
    {
    }

    public function execute(): array
    {
        return $this->tournamentRepository->findAll();
    }
}
