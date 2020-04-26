<?php

namespace App\Service;


class HomePageService
{
    public function login($request)
    {
        $nombre = $request['nombre'];
        $apellido = $request['apellido'];
        $email = $request['email'];
        $password = $request['password'];
        dd($nombre,$apellido,$email,$password);
    }
}