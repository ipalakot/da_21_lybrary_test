<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use App\Entity\Categorie;
use App\Entity\Commentaire;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
//use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

use Faker; 
use Faker\Factory;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $faker = \Faker\Factory::create('fr_FR');

        for ($i=0; $i<2 ; $i++) {
            $categorie = new Categorie();
            $categorie->setTitre($faker->sentence())
                      ->setResume($faker->sentence());
            $manager->persist($categorie);

            for ($l=0; $l<2 ; $l++) {
                $auteur = new Auteur();
                $auteur->setNom($faker->sentence())
                        ->setPrenom($faker->sentence())
                        ->setMail($faker->sentence());
                $manager->persist($auteur);

                for ($j=0; $j<3 ; $j++) {
                    $article = new Article();
                    $article->setTitle($faker->sentence())
                            ->setResume($faker->text())
                            ->setContenu($faker->text())
                            ->setCreatedAt(new \DateTime())
                            ->setStatus([1])
                            ->setCategorie($categorie)
                            ->setAuteur($auteur);
                    $manager->persist($article);
                    
                    for ($k=1; $k<=mt_rand(4, 10); $k++) {
                        $commentaire = new Commentaire();
                        $days = (new \DateTime());
                        $commentaire->setAuteur($faker->name)
                                     ->setContenu($faker->realText($maxNbChars = 200, $indexSize = 2))
                                     ->setCreatedAt($faker->dateTime())
                                     ->setArtile($article);
                        $manager-> persist($commentaire);
                    }
                }
            }
        }
        $manager->flush();
    }
}