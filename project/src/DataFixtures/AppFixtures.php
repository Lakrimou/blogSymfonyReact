<?php

namespace App\DataFixtures;

use App\Document\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $blogPost = new BlogPost();
        $blogPost->setTitle('A first post !');
        $blogPost->setPublished(new \DateTime('2020-04-12 03:35'));
        $blogPost->setContent('Post text!');
        $blogPost->getAuthor('Akrem Boussaha');
        $blogPost->setSlug('a-first-post');
        $manager->persist($blogPost);

        $blogPost = new BlogPost();
        $blogPost->setTitle('A second post !');
        $blogPost->setPublished(new \DateTime('2020-04-12 03:35'));
        $blogPost->setContent('Post text!');
        $blogPost->getAuthor('Akrem Boussaha');
        $blogPost->setSlug('a-second-post');
        $manager->persist($blogPost);

        $manager->flush();
    }
}
