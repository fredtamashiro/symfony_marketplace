<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route(['/admin/login','/admin'], name: 'app_admin_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError(); // busca erros de autenticacao

        $last_username = $authenticationUtils->getLastUsername(); // busca o ultimo usuario utilizado

        return $this->render('admin/login/index.html.twig', [
            'last_username' => $last_username,
            'error' => $error
        ]);
    }

    #[Route('/admin/logout', name: 'app_admin_logout')]
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }
}
