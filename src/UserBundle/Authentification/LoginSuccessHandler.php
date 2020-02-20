<?php


namespace UserBundle\Authentification;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    protected
        $router,
        $security;

    public function __construct(Router $router, AuthorizationChecker $security)
    {
        $this->router = $router;
        $this->security = $security;
    }


    /**
     * This is called when an interactive authentication attempt succeeds. This
     * is called by authentication listeners inheriting from
     * AbstractAuthenticationListener.
     *
     * @return Response
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        //URL for redirect the user to where they were before the login process begun if you want.
        // $referer_url = $request->headers->get('referer');

        // Default target for unknown roles. Everyone else go there.

        $url = 'user_homepage';

        if ($this->security->isGranted('ROLE_ADMIN')) {
            $url = 'accuil';
        }
        elseif ($this->security->isGranted('ROLE_PART')) {
            $url = 'accuil';
        }
        elseif ($this->security->isGranted('ROLE_CLIENT'))
        {
            $url= 'layout' ;//accuil front
        }
        $response = new RedirectResponse($this->router->generate($url));

        return $response;
    }
}