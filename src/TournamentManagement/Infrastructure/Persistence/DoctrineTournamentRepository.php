<?php
declare(strict_types=1);

namespace App\TournamentManagement\Infrastructure\Persistence;

use App\TournamentManagement\Domain\Entity\Tournament;
use App\TournamentManagement\Domain\Repository\TournamentRepository;
use App\TournamentManagement\Domain\ValueObject\TournamentId;
use Doctrine\ORM\EntityManagerInterface;

readonly class DoctrineTournamentRepository implements TournamentRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function save(Tournament $tournament): void
    {
        $this->entityManager->persist($tournament);
        $this->entityManager->flush();
    }

    public function findById(TournamentId $id): ?Tournament
    {
        return $this->entityManager->getRepository(Tournament::class)
            ->findOneBy(['id' => $id]);
    }

    public function findAll(): array
    {
        return $this->entityManager->getRepository(Tournament::class)
            ->findAll();
    }
}
