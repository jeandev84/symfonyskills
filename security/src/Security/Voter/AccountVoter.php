<?php
namespace App\Security\Voter;

use App\Entity\Account;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

// replace with your own logic
// https://symfony.com/doc/current/security/voters.html
class AccountVoter extends Voter
{

    public function __construct(public Security $security)
    {
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        return in_array($attribute, ['SHOW', 'DELETE'])
            && $subject instanceof \App\Entity\Account;
    }


    /**
     * @param string $attribute
     * @param Account $account [ This is a $subject ]
     * @param TokenInterface $token
     * @return bool
    */
    protected function voteOnAttribute(string $attribute, $account, TokenInterface $token): bool
    {
        /* dd($this->security); */

        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        $accessIsGranted = match ($attribute) {
                # user is account holder | user is account manager
               'SHOW'   => $this->show($account, $user), // bool (true|false)
               'DELETE' => $this->security->isGranted('ROLE_ADMIN')
        };


        return $accessIsGranted;

    }



    /**
     * @param Account $account
     * @param User $user
     * @return bool
    */
    private function show(Account $account, User $user): bool
    {
         return $account->getAccountHolder() == $user
                || $account->getAccountManager() == $user
                || $this->security->isGranted('ROLE_ADMIN')
             ;
    }
}
