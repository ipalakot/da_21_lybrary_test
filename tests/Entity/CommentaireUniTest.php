<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;

use App\Entity\Commentaire;
use App\Entity\Article;

use DateTimeImmutable;

class CommentaireUniTest extends TestCase
{
    public function testValide(): void
    {
        $dateTime = New DateTimeImmutable();
 
        $commentaire = new Commentaire();

        $article = new Article();

        $commentaire->setCreatedAt($dateTime)
                    ->setContenu('Contenu')
                    ->setArticle($article);
       
        $this->assertTrue($commentaire->getCreatedAt()===$dateTime);
        $this->assertTrue($commentaire->getContenu()==='Contenu');
        $this->assertTrue($commentaire->getArticle()===$article);
    }

            public function testvide(): void
    {
        $dateTime = New DateTimeImmutable();
        $commentaire = new Commentaire();

        $this->assertEmpty($commentaire->getCreatedAt() );
        $this->assertEmpty($commentaire->getContenu());
         $this->assertEmpty($commentaire->getId());
         $this->assertEmpty($commentaire->getArticle());
    }
}