### 1.Configuration Knpu OAuth2 Yaml


1. Configuration file (./config/packages/knpu_oauth2_client.yaml)
```
knpu_oauth2_client:
    clients:
        # configure your clients as described here: https://github.com/knpuniversity/oauth2-client-bundle#configuration
        github:
            type: github
            client_id: '%env(GITHUB_ID)%'
            client_secret: '%env(GITHUB_SECRET)%'
            redirect_route: oauth_check
            redirect_params:
                service: github

```



2. Create route for connection via Github (./src/Controller/SecurityController)
```

<?php

namespace App\Controller;

use App\Manager\UserManager;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    ....

    /**
     * @Route("/connect/github", name="github_connect")
     * @param ClientRegistry $clientRegistry
     * @return void
    */
    public function connectViaSocialNetwork(ClientRegistry $clientRegistry)
    {
          dd($clientRegistry->getClient('github'));
    }



    ............
}


ADD TO THE TEMPLATE templates/security/login.html.twig next :

...

<p>
    <a href="{{ path('github_connect') }}">Se  connecter avec github</a>
</p>
    
...
```





3. Configuration route 
```
#index:
#    path: /
#    controller: App\Controller\DefaultController::index


oauth_check:
  path: /oauth/check/{service}
  controller: Symfony\Bundle\FrameworkBundle\Controller\TemplateController
```