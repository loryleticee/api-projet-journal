<?php

namespace App\Doctrine;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Entity\Article;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Security\Core\Security;

class CurrentUserData implements QueryCollectionExtensionInterface {
    private Security $security;

    public function __construct(Security $security) {
        $this->security = $security;
    }

    public function applyToCollection(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null)
    {
       
        // if ($resourceClass == Article::class) {
        //     if(in_array("ROLE_ADMIN", $this->security->getUser()->getRoles()) === false) {
        //         $aliasTable = $queryBuilder->getRootAliases()[0];
        //         $queryBuilder->andWhere("$aliasTable.author = :authenticated_user")->setParameter("authenticated_user", $this->security->getUser()->getId());
        //     }
        // }
    }
}