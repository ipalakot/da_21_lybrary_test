<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Auteur;
use App\Entity\Article;

class AuteurUniTest extends TestCase
{
    public function testAuteurValid(): void
    {

        $auteur= new Auteur();
        
        $auteur->setNom('noms')
                ->setPrenom('prenoms')
                ->setMail('mail.mail.com');
                     
        $this->assertTrue($auteur->getNom()==='noms');
        $this->assertTrue($auteur->getPrenom()==='prenoms');
        $this->assertTrue($auteur->getMail()==='mail.mail.com');
    }

    public function testAuteurVide(): void
    {
        $auteur = new Auteur();
        
         $this->assertEmpty($auteur->getNom());
        $this->assertEmpty($auteur->getPrenom());
        $this->assertEmpty($auteur->getMail());
        $this->assertEmpty($auteur->getId());  
    }

    public function testAddremoveSetArticles()
    {        
        $auteur = new Auteur();
        $article = new Article();

        $this->assertEmpty($auteur->getArticles());

        $auteur->addArticle($article);
        $this->assertContains($article, $auteur->getArticles());

        $auteur->removeArticle($article);
        $this->assertEmpty($auteur->getArticles());
    }
}