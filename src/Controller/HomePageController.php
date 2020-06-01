<?php

namespace App\Controller;

use App\Service\HomePageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/home/page", name="home_page")
     */
    public function index(Request $request,HomePageService $homePageService)
    {
        return $this->json($homePageService->createAccount($request->request->all()));
    }

    /**
     * @Route("/login",name="login")
     */
    public function login(Request $request,HomePageService $homePageServie)
    {
        return $this->json($homePageServie->login($request->request->all()));
    }
}
