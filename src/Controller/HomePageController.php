<?php

namespace App\Controller;

use App\Service\HomePageService;
use http\Env\Response;
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
     * @Route("/login_old",name="login_old")
     */
    public function login(Request $request,HomePageService $homePageServie)
    {
        return $this->json($homePageServie->login($request->request->all()));
    }
    /**
     * @Route("/succes/login",name="success_login")
     */
    public function success_login()
    {
         return new \Symfony\Component\HttpFoundation\Response(
        '<html><body>Hello</body></html>'
    );
    }

}
