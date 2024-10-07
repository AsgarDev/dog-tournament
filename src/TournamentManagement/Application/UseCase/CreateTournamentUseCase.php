<?php
declare(strict_types=1);

namespace App\TournamentManagement\Application\UseCase;

use App\TournamentManagement\Domain\Entity\Tournament;
use App\TournamentManagement\Domain\Repository\TournamentRepository;
use App\TournamentManagement\Application\Command\CreateTournamentCommand;

readonly class CreateTournamentUseCase
{
    public function __construct(private TournamentRepository $tournamentRepository)
    {
    }

    public function execute(CreateTournamentCommand $command): Tournament
    {
        $tournament = Tournament::create(
            $command->name,
            $command->startDate,
            $command->endDate
        );

        $this->tournamentRepository->save($tournament);

        return $tournament;
    }
}
