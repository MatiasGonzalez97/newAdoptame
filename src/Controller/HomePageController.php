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
     */s
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

    public function google(){
        $google_client = new \Google_Client();
        $google_client->setClientId('390105725539-pl27ntt29kme2guj4cb17nevv9l2s84g.apps.googleusercontent.com');
        $google_client->setRedirectUri('http://localhost/tutorial/php-login-using-google-demo/index.php');
        $google_client->addScope('email');
        $google_client->addScope('profile');
        session_start();
    }

}
