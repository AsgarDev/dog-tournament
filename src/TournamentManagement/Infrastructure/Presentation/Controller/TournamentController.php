<?php
declare(strict_types=1);

namespace App\TournamentManagement\Infrastructure\Presentation\Controller;

use App\TournamentManagement\Application\Command\CreateTournamentCommand;
use App\TournamentManagement\Application\DTO\TournamentDTO;
use App\TournamentManagement\Application\UseCase\CreateTournamentUseCase;
use App\TournamentManagement\Application\UseCase\GetTournamentDetailsUseCase;
use App\TournamentManagement\Application\UseCase\GetTournamentsUseCase;
use App\TournamentManagement\Domain\ValueObject\TournamentId;
use App\TournamentManagement\Infrastructure\Presentation\Form\TournamentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TournamentController extends AbstractController
{
    public function __construct(
        private readonly CreateTournamentUseCase $createTournamentUseCase,
        private readonly GetTournamentsUseCase $getTournamentUseCase,
        private readonly GetTournamentDetailsUseCase $getTournamentDetailsUseCase,
    )
    {
    }

    #[Route('/tournament', name: 'tournament_create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        $tournamentDTO = new TournamentDTO();
        $form = $this->createForm(TournamentType::class, $tournamentDTO);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $command = new CreateTournamentCommand(
                $tournamentDTO->name,
                $tournamentDTO->startDate,
                $tournamentDTO->endDate
            );

            $tournament = $this->createTournamentUseCase->execute($command);

            return $this->redirectToRoute('tournament_compose', ['id' => $tournament->getId()]);
        }

        return $this->render('tournament/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/tournament/compose/{id}', name: 'tournament_compose', methods: ['GET', 'POST'])]
    public function compose(string $id, Request $request): Response
    {
        $tournamentId = TournamentId::fromString($id);
        $tournament = $this->getTournamentDetailsUseCase->execute($tournamentId);

        if (!$tournament) {
            throw $this->createNotFoundException("Le tournoi avec l'ID $id n'existe pas.");
        }

        return $this->render('tournament/compose.html.twig', [
            'tournament' => $tournament,
        ]);
    }
}
