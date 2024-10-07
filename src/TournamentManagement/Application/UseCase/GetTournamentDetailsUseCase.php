<?php
declare(strict_types=1);

namespace App\TournamentManagement\Application\UseCase;

use App\TournamentManagement\Domain\Repository\TournamentRepository;
use App\TournamentManagement\Domain\Entity\Tournament;
use App\TournamentManagement\Domain\ValueObject\TournamentId;

readonly class GetTournamentDetailsUseCase
{
    public function __construct(private TournamentRepository $tournamentRepository)
    {
    }

    public function execute(TournamentId $id): array
    {
        return $this->tournamentRepository->findById($id);
    }
}
