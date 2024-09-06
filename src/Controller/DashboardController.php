<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use App\Entity\HeaderProcess;
use App\Entity\DetailProcess;


class DashboardController extends AbstractController
{
    private EntityManagerInterface $entityManager;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'groups' => $this->entityManager->getRepository(HeaderProcess::class)->findAll()
        ]);
    }

    #[Route('/get-group-data', name: 'app_get_group_data')]
    public function getGroupData(Request $request, SerializerInterface $serializer): JsonResponse
    {
        $groupId = $request->get('groupId');
        $headerProcess = $this->entityManager->getRepository(HeaderProcess::class)->find($groupId);
        $data = $this->entityManager->getRepository(DetailProcess::class)->findOneBy(['header_process' => $headerProcess]);
        $data = $data->getData();

        foreach($data['osTotal'] as $key => $os) {
            $osFormattedData[] = [
                'name' => $key,
                'y' => $os
            ];
        }

        return new JsonResponse([
            'data' => $data,
            'osFormattedData' => $osFormattedData
            ]
        );
    }
}
