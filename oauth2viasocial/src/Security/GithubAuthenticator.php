<?php
namespace App\Security;

use App\Manager\UserManager;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Client\OAuth2ClientInterface;
use KnpU\OAuth2ClientBundle\Client\Provider\GithubClient;
use KnpU\OAuth2ClientBundle\Security\Authenticator\SocialAuthenticator;
use League\OAuth2\Client\Provider\GithubResourceOwner;
use League\OAuth2\Client\Token\AccessToken;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Util\TargetPathTrait;


class GithubAuthenticator extends SocialAuthenticator
{


    use TargetPathTrait;


    /**
     * @var RouterInterface
    */
    protected $router;


    /**
     * @var ClientRegistry
    */
    protected $clientRegistry;



    /**
     * @var UserManager
    */
    protected $userManager;




    /**
     * @param RouterInterface $router
     * @param ClientRegistry $clientRegistry
     * @param UserManager $userManager
    */
    public function __construct(RouterInterface $router, ClientRegistry $clientRegistry, UserManager $userManager)
    {
         $this->router = $router;
         $this->clientRegistry = $clientRegistry;
         $this->userManager = $userManager;
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
         return $this->fetchAccessToken($this->getGithubClient());
    }




    /**
     * @param AccessToken $credentials
     * @param UserProviderInterface $userProvider
     * @return UserInterface
     */
    public function getUser($credentials, UserProviderInterface $userProvider): UserInterface
    {
         /** @var GithubResourceOwner $githubUser */
         $githubUser = $this->getGithubClient()->fetchUserFromToken($credentials);

         return $this->userManager->findOrCreateUserFromGithubAuth($githubUser);
    }


    /**
     * @param Request $request
     * @param AuthenticationException $exception
     * @return Response|void|null
    */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {

    }


    /**
     * @param Request $request
     * @param TokenInterface $token
     * @param string $providerKey
     * @return RedirectResponse
    */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey): RedirectResponse
    {
        // Chemin ou il faudra rediriger l' utilisateur
        $targetPath = $this->getTargetPath($request->getSession(), $providerKey);

        return new RedirectResponse($targetPath ?: $this->router->generate('home'));
    }





    /**
     * @return GithubClient
    */
    private function getGithubClient(): GithubClient
    {
         return $this->clientRegistry->getClient('github');
    }
}