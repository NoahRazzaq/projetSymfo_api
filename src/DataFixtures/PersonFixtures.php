<?php

namespace App\DataFixtures;

use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory as ExceptionFactory;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class PersonFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create('fr_FR');
        
        for ($i=0; $i < 10; $i++) { 
            $person = new Person();
            $person->setFirstname($this->faker->word())
                    ->setLastName($this->faker->word());
        
            $manager->persist($person); 
        }

        $manager->flush();
    }
}
