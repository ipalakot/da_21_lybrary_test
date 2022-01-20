<?php

namespace App\Tests\Entity;

use App\Entity\Categorie;
use App\Entity\Article;
use PHPUnit\Framework\TestCase;

class CategorieUniTest extends TestCase
{
    public function testIsTrue()
    {
        $categorie = new Categorie();
        
        $categorie->setTitre('Titre')
                   ->setResume('Resume');
                   
        $this->assertTrue($categorie->getTitre()==='Titre');
        $this->assertTrue($categorie->getResume()==='Resume');
    }

    public function testIsEmpty()
    {
        $categorie = new categorie();
        
        $this->assertEmpty($categorie->getTitre());
        $this->assertEmpty($categorie->getResume() );
        $this->assertEmpty($categorie->getId());
    }

        public function testAddremoveSetArticles()
    {        
        
        $categorie = new Categorie();
        $article = new Article();

        $this->assertEmpty($categorie->getArticles());

        $categorie->addArticle($article);
        $this->assertContains($article, $categorie->getArticles());

        $categorie->removeArticle($article);
        $this->assertEmpty($categorie->getArticles());
    }


}