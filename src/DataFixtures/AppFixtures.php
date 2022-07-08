<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Produit;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    public function __construct(SluggerInterface $slugger)
    {
            $this->slugger = $slugger ;
    }         
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for($j = 0 ; $j <= 4 ; $j++ ) {

         $categorie = new Categorie();
         $categorie->setNom($faker->sentence())
         ->setSlug($this->slugger($categorie->getNom())) ;
         $manager->persist($categorie);

        // $manager->persist($product);
            for($i = 1 ; $i <= mt_rand(1,5) ; $i++ ) {
                $produit = new Produit();
                $produit->setNom("Titre du produit n° : $i ")
                ->setDescription("Description du produit n° : $i ")
            // ->setImage("https://picsum.photos/id/23$i/300/160")
            ->setImage("https://picsum.photos/id/2".mt_rand(1,70)."/300/160")
                ->setPrix(mt_rand(25,70))
                ->setStock(mt_rand(0,100))
                ->setCategorie();
                $manager->persist($produit);
            }  
        }
        $manager->flush();
        
    }
}
