<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\CompanyType;
use App\Repository\CompanyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class CompanyController extends AbstractController
{
    #[Route('/companies')]
    public function index(CompanyRepository $repository): Response
    {
        $entities = $repository->findAll();

        return $this->render('company/index.html.twig', [
            'companies' => $entities,
        ]);
    }

    #[Route('/companies/add')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CompanyType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entity = $form->getData();

            $entityManager->persist($entity);
            $entityManager->flush();

            // TODO -> AddFlash
        }

        return $this->render('company/create.html.twig', [
            'companyForm' => $form->createView()
        ]);
    }
    #[Route('/companies/{id}')]
    public function show(int $id, CompanyRepository $repository): Response
    {
        $entity = $repository->find($id);

        return $this->render('company/show.html.twig', [
            'company' => $entity,
        ]);
    }

    #[IsGranted('ROLE_USER')]
    #[Route('/companies/{id}/update')]
    public function update(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
       // $this->denyAccessUnlessGranted('ROLE_USER');

        $entity = $entityManager->find(Company::class, $id);

        if (!$entity) {
            throw $this->createNotFoundException();
        }

        $form = $this->createForm(CompanyType::class, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entity = $form->getData();

            $entityManager->persist($entity);
            $entityManager->flush();

            // TODO -> AddFlash
        }

        return $this->render('company/update.html.twig', [
            'companyForm' => $form->createView()
        ]);
    }
}
