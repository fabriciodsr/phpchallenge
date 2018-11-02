<?php

namespace PHPChallenge\Domain\Entities\Authentication\Traits;

use PHPChallenge\Domain\Entities\User;
use EntityManager;

trait UsesPasswordGrant
{

    /**
     * @param string $userIdentifier
     * @return User
     */
    public function findForPassport($userIdentifier)
    {
        $userRepository = EntityManager::getRepository(get_class($this));
        return $userRepository->findOneByEmail($userIdentifier);
    }

}
