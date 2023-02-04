<?php
namespace App\Security;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Security\Authenticator\SocialAuthenticator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;


class GithubAuthenticator extends SocialAuthenticator
{

    /**
     * @var RouterInterface
    */
    protected $router;


    /**
     * @var ClientRegistry
    */
    protected $clientRegistry;


    /**
     * @param RouterInterface $router
     * @param ClientRegistry $clientRegistry
    */
    public function __construct(RouterInterface $router, ClientRegistry $clientRegistry)
    {
         $this->router = $router;
         $this->clientRegistry = $clientRegistry;
    }



    public function start(Request $request, AuthenticationException $authException = null): RedirectResponse
    {
        return new RedirectResponse($this->router->generate('app_login'));
    }

    public function supports(Request $request)
    {
         // On verifit si le nom de la route est egal a "oauth_check"
         // et que le query parameter service egal a "github"
         // le parametre service a ete predefinit dans ./config/routes.yaml
         return 'oauth_check' === $request->attributes->get('_route') && $request->get('service') === 'github';
    }

    public function getCredentials(Request $request)
    {
         // On Recupere le token pour le client github
         return $this->fetchAccessToken($this->clientRegistry->getClient('github'));
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
         dd($credentials);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        // TODO: Implement onAuthenticationFailure() method.
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey)
    {
        // TODO: Implement onAuthenticationSuccess() method.
    }
}