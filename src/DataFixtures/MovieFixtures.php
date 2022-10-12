<?php

namespace App\DataFixtures;

use App\Entity\Person;
use App\Entity\Movie;
use App\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create('fr_FR');

        $genres = $manager->getRepository(Genre::class)->findAll();

        $persons = $manager->getRepository(Person::class)->findAll();

        foreach ($genres as $genre) {
            for ($i=0; $i < 10; $i++) { 
               $movie = new Movie();
               $movie->setTitle($this->faker->word(3, true))
                        ->setDuration(rand(80, 300))
                        ->setProductionYear(rand(1990, 2020))
                        ->setSynopsis($this->faker->text())
                        ->setGenre($genre);
                
                shuffle($persons);

                foreach(array_slice($persons, 3, 2)as $person){
                    $movie->getActors()->add($person);
                }

                foreach(array_slice($persons, 3, 2)as $person){
                    $movie->getDirectors()->add($person);
                }


                $manager->persist($movie);
            }
        }
        $manager->flush();  
    }
}
