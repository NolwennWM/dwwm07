<?php

namespace App\Controller;

use App\Entity\Ville;
use App\Form\VilleType;
use App\Service\Uploader;
use App\Repository\VilleRepository;
use App\Service\Mailer;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/ville')]
class VilleController extends AbstractController
{
    public function __construct(private Uploader $uploader)
    {}
    #[Route('/{id<\d+>}', name: 'detailVille')]
    public function detail(Ville $ville=null): Response
    {
        if(!$ville) return $this->redirectToRoute("readVille");
        
        return $this->render('ville/detail.html.twig', [
            'ville' => $ville,
        ]);
    }
    #[Route('/', name: 'readVille')]
    public function read(ManagerRegistry $doc): Response
    {
        $repo = $doc->getRepository(Ville::class);
        $villes = $repo->findAll();
        return $this->render('ville/index.html.twig', [
            'villes' => $villes,
        ]);
    }
    #[Route('/interval/{min}/{max}', name: 'intervalVille')]
    public function interval(VilleRepository $repo, $min, $max): Response
    {
        $villes = $repo->findByPopulationInterval($min, $max);
        return $this->render('ville/index.html.twig', [
            'villes' => $villes,
        ]);
    }
    #[Route('/add', name: 'addVille')]
    public function create(ManagerRegistry $doc, Request $request, Mailer $mailer): Response
    {
        $ville = new Ville();
        $form = $this->createForm(VilleType::class, $ville);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {

            $photo = $form->get("photoFile")->getData();
            if($photo)
            {
                $this->denyAccessUnlessGranted("ROLE_ADMIN");
                $dir = $this->getParameter("ville_directory");
                $ville->setPhoto($this->uploader->uploadFile($photo, $dir));
            }
            $em = $doc->getManager();
            $em->persist($ville);
            $em->flush();

            $this->addFlash("success", "Une nouvelle ville a bien été ajouté");
            $mailer->sendEmail();
            return $this->redirectToRoute("readVillePage");
        }
        return $this->render('ville/create.html.twig', [
            'villeForm' => $form->createView()
        ]);
    }
    #[Route('/delete/{id<\d+>}', name: 'deleteVille')]
    public function delete(Ville $ville=null, ManagerRegistry $doc): Response
    {
        if($ville) 
        {
            $em = $doc->getManager();
            $em->remove($ville);
            $em->flush();
        }
        return $this->redirectToRoute("readVille");
    }
    #[Route('/update/{id<\d+>}', name: 'updateVille')]
    public function update(Ville $ville=null, ManagerRegistry $doc, Request $request): Response
    {
        if(!$ville)
        {
            $this->addFlash("danger", "Aucune ville sélectionnée.");
            return $this->redirectToRoute("readVillePage");
        }
        $form = $this->createForm(VilleType::class, $ville);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $photo = $form->get("photoFile")->getData();
            if($photo)
            {
                $dir = $this->getParameter("ville_directory");
                $ville->setPhoto($this->uploader->uploadFile($photo, $dir));
            }
            $em = $doc->getManager();
            $em->persist($ville);
            $em->flush();

            $this->addFlash("success", "Ville édité.");
            return $this->redirectToRoute("readVillePage");
        }
        return $this->render('ville/create.html.twig', [
            'villeForm' => $form->createView()
        ]);
    }
    #[Route('/page/{page?1}/{nb?5}', name: 'readVillePage')]
    public function readPaginate(VilleRepository $repo,$nb, $page): Response
    {
        $villes = $repo->findBy([], [], $nb, ($page-1)*$nb);
        $total = $repo->count([]);
        $nbPage = ceil($total / $nb);
        return $this->render('ville/pagination.html.twig', [
            'villes' => $villes,
            "nbPage" => $nbPage,
            "nombre" => $nb,
            "page"=>$page
        ]);
    }
    #[Route('/{name}/{nb?1}', name: 'readVilleName')]
    public function readByName(VilleRepository $repo,$nb, $name): Response
    {
        if($nb > 1)
        {
            $villes = $repo->findBy(["nom"=>$name], [], $nb);
            return $this->render('ville/index.html.twig', [
                'villes' => $villes,
            ]);
        }
        $ville = $repo->findOneBy(["nom"=>$name]);
        return $this->render('ville/detail.html.twig', [
            'ville' => $ville,
        ]);
    }
}
