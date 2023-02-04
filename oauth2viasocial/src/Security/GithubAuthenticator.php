<?php
namespace App\Security;

use App\Manager\UserManager;
use App\Security\Exception\NotVerifiedEmailException;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Client\OAuth2ClientInterface;
use KnpU\OAuth2ClientBundle\Client\Provider\GithubClient;
use KnpU\OAuth2ClientBundle\Security\Authenticator\SocialAuthenticator;
use League\OAuth2\Client\Provider\GithubResourceOwner;
use League\OAuth2\Client\Token\AccessToken;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;


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
         return $this->fetchAccessToken($this->githubClient());
    }


    /**
     * @param AccessToken $credentials
     * @param UserProviderInterface $userProvider
     * @return UserInterface
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
    */
    public function getUser($credentials, UserProviderInterface $userProvider): UserInterface
    {
         /** @var GithubResourceOwner $githubUser */
         $githubUser = $this->githubClient()->fetchUserFromToken($credentials);


         // On recupere l' email de l' utilisateur
         $response = HttpClient::create()->request('GET', 'https://api.github.com/user/emails', [
             'headers' => [
                 'authorization' => "token {$credentials->getToken()}"
             ]
         ]);


         $emails = $response->toArray();

         foreach ($emails as $email) {
             if ($email['primary'] === true && $email['verified'] === true) {
                  $data = $githubUser->toArray();
                  $data['email'] = $email['email'];
                  $githubUser = new GithubResourceOwner($data);
             }
         }


         if ($githubUser->getEmail() === null) {
               throw new NotVerifiedEmailException();
         }


         return $this->userManager->findOrCreateUserFromGithubAuth($githubUser);
    }


    /**
     * @param Request $request
     * @param AuthenticationException $exception
     * @return Response|void|null
    */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
          if ($request->hasSession()) {
              $request->getSession()->set(Security::AUTHENTICATION_ERROR, $exception);
          }

          return new RedirectResponse($this->router->generate('app_login'));
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
    private function githubClient(): GithubClient
    {
         return $this->clientRegistry->getClient('github');
    }
}