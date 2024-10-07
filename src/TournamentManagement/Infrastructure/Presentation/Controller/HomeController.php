<?php
declare(strict_types=1);

namespace App\TournamentManagement\Infrastructure\Presentation\Controller;

use App\TournamentManagement\Application\UseCase\GetTournamentsUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(private readonly GetTournamentsUseCase $getTournamentsUseCase)
    {
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $tournaments = $this->getTournamentsUseCase->execute();

        return $this->render('home/index.html.twig', [
            'tournaments' => $tournaments,
        ]);
    }
}
