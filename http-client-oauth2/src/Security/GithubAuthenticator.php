<?php
namespace App\Security;

use App\Service\Github\GithubUserProvider;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;

class GithubAuthenticator extends AbstractGuardAuthenticator
{

    protected $provider;


    /**
     * @param GithubUserProvider $provider
    */
    public function __construct(GithubUserProvider $provider)
    {
         $this->provider = $provider;
    }



    public function supports(Request $request)
    {
         return $request->query->get('code');
    }



    public function getCredentials(Request $request): array
    {
         return [
             'code' => $request->query->get('code')
         ];
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
         // LOGIC => GET USER FROM GITHUB
         $this->provider->loadUserFromGithub($credentials['code']);
         return new User();
    }

    public function checkCredentials($credentials, UserInterface $user): bool
    {
         return true;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        // todo
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // todo
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
         return new JsonResponse("Unauthorized");
    }

    public function supportsRememberMe()
    {
        // todo
    }
}
