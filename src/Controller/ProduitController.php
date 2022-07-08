<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produits", name="app_produits")
     */
    public function index(ProduitRepository $produitRepo): Response
    {
        $produits = $produitRepo->findAll();
        return $this->render('produit/index.html.twig', [
            'produits' => $produits 
        ]);
    }
      /**
     * @Route("/produit/{id}", name="app_detail_produit" , requirements={"id"="\d+"} )
     */
    public function detail($id,ProduitRepository $produitRepo): Response
    {
        //$produits = $produitRepo->find($id);
        return $this->render('produit/detail.html.twig', [
            'produit' => $produitRepo->find($id)
        ]);
    }

 /*   public function show($id): Response
    {
        $produitsRepo = $this->getDoctrine()->getRepository( Produit::class);
        $produits = $produitsRepo->find($id);
        return $this->render('test/show.html.twig', [
            'produits' => $produits 
        ]);
    }*/
}
