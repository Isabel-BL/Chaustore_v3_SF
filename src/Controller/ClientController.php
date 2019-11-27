<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends AbstractController
{
    /**
     * @Route("/", name="client", methods={"GET"})
     */
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('client/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }
    
}
