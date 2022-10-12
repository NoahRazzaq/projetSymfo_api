<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class GenreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create('fr_FR');

        for ($i=0; $i < 10; $i++) { 
           $genre = new Genre();
           $genre->setName($this->faker->word());

        $manager->persist($genre); 

        }
        $manager->flush(); 
    }
}
