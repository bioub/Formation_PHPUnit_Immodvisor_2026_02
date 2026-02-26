<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contacts')]
class ContactController extends AbstractController
{
    #[Route(methods: ['GET'])]
    public function index(ContactRepository $repository): Response
    {
//        $entities = $repository->findBy([], limit: 100);
        $entities = $repository->findAllWithCompaniesDQL();

        return $this->render('contact/index.html.twig', [
            'contacts' => $entities,
        ]);
    }

    #[Route('/add', methods: ['GET', 'POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        $contact = $form->getData();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contact);
            $entityManager->flush();

            $this->addFlash('success', "Le contact {$contact->getFirstname()} {$contact->getLastname()} a bien été créé");

            return $this->redirectToRoute('app_contact_index');
        }

        // $request->getSession()->set('token', '12143FDGDTG');
        return $this->render('contact/create.html.twig', [
            'contactForm' => $form->createView(),
        ]);
    }

    #[Route('/{id}', requirements: ["id" => "[1-9][0-9]*"], methods: ['GET'])]
    public function show($id, ContactRepository $repository): Response
    {
        $entity = $repository->find($id);

        if (!$entity) {
            throw $this->createNotFoundException("Contact $id not found");
        }

        return $this->render('contact/show.html.twig', [
            'contact' => $entity
        ]);
    }

    #[Route('/{id}/delete', requirements: ["id" => "[1-9][0-9]*"], methods: ['GET', 'POST'])]
    public function delete($id, ContactRepository $repository, Request $request, EntityManagerInterface $manager): Response
    {
        $entity = $repository->find($id);

        if (!$entity) {
            throw $this->createNotFoundException("Contact $id not found");
        }

        if ($request->isMethod('POST')) {
            if ($request->get('confirm') === 'oui' && $this->isCsrfTokenValid('delete'.$entity->getId(), $request->request->get('_token'))) {
                $manager->remove($entity);
                $manager->flush();

                $this->addFlash('success', "Le contact {$entity->getFirstname()} {$entity->getLastname()} a bien été supprimé");
            }

            return $this->redirectToRoute('app_contact_index');
        }

        return $this->render('contact/delete.html.twig', [
            'contact' => $entity
        ]);
    }

    #[Route('/{id}/update', requirements: ["id" => "[1-9][0-9]*"], methods: ['GET', 'POST'])]
    public function update($id): Response
    {
        return $this->render('contact/update.html.twig');
    }
}
