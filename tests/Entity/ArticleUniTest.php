<?php

namespace App\Tests\Entity;

use App\Entity\Auteur;
use DateTimeImmutable;
use App\Entity\Article;

use App\Entity\Categorie;
use App\Entity\Commentaire;
use PHPUnit\Framework\TestCase;

class ArticleUniTest extends TestCase
{
  public function testValide(): void {
      
    $dateTime = New DateTimeImmutable();
    $categorie = new Categorie();
    $auteur = new Auteur();
    $categorie = new Categorie();

    $article = New Article();
    
    $article->setTitle('Titre')
            ->setResume('resume')
            ->setCreatedAt($dateTime)
            ->setContenu('contenu') 
            ->setStatus([1])
            ->setAuteur($auteur)
            ->setCategorie($categorie);

    $this->assertTrue($article->getTitle()==='Titre');
    $this->assertTrue($article->getResume()==='resume');
    $this->assertTrue($article->getCreatedAt()===$dateTime);
    $this->assertTrue($article->getContenu()==='contenu'); 
    $this->assertTrue($article->getStatus()===[1]);
    $this->assertTrue($article->getAuteur()===$auteur);
     $this->assertTrue($article->getCategorie()===$categorie);
   
  }

  public function testVide(): void {
      
    $dateTime = New DateTimeImmutable();
    $article = New Article(); 

    $this->assertEmpty($article->getId());
    $this->assertEmpty($article->getTitle());
    $this->assertEmpty($article->getResume());
    $this->assertEmpty($article->getCreatedAt());
    $this->assertEmpty($article->getContenu()); 
    $this->assertEmpty($article->getStatus());
  }

     public function testAjoutSupprAffCommentaires(){
        
        $article = new Article();
        $commentaire = new Commentaire();

        $this->assertEmpty($article->getCommentaires());

        $article->addCommentaire($commentaire);
        $this->assertContains($commentaire, $article->getCommentaires());

        $article->RemoveCommentaire($commentaire);
        $this->assertEmpty($article->getCommentaires());
    }
}