<?php

namespace App\State;

use ApiPlatform\Metadata\CollectionOperationInterface;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Entity\Movie;
use App\Repository\MovieRepository;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class MovieProvider implements ProviderInterface
{

    public function __construct(private MovieRepository $movieRepository, private TokenStorageInterface $tokenStorage)
    {
        
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        if ($operation instanceof CollectionOperationInterface) {
            return [new Movie(), new Movie()];
        }

        return $this->provider->provide($operation, $uriVariables, $context);
        
    }
}
