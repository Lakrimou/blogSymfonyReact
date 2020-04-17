<?php

namespace App\DataFixtures\MongoDB;

use App\Document\BlogPost;
use App\Document\Comment;
use App\Document\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->loadUser($manager);
        $this->loadBlogPosts($manager);
    }

    public function loadBlogPosts(ObjectManager $manager)
    {
        $user = $this->getReference('user_admin');
        $blogPost = new BlogPost();
        $blogPost->setTitle('A first post !');
        $blogPost->setPublished(new \DateTime('2020-04-12 03:35'));
        $blogPost->setContent('Post text!');
        $blogPost->setAuthor($user);
        $blogPost->setSlug('a-first-post');
        $manager->persist($blogPost);

        $blogPost = new BlogPost();
        $blogPost->setTitle('A second post !');
        $blogPost->setPublished(new \DateTime('2020-04-12 03:35'));
        $blogPost->setContent('Post text!');
        $blogPost->setAuthor($user);
        $blogPost->setSlug('a-second-post');
        $manager->persist($blogPost);

        $blogPost = new BlogPost();
        $blogPost->setTitle('A third post !');
        $blogPost->setPublished(new \DateTime('2020-04-12 03:35'));
        $blogPost->setContent('Post text!');
        $blogPost->setAuthor($user);
        $blogPost->setSlug('a-third-post');
        $manager->persist($blogPost);

        $manager->flush();
    }

    public function loadComments(ObjectManager $manager)
    {
        $comment = new Comment();
        $manager->persist($comment);

        $manager->flush();
    }

    public function loadUser(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('Lakrimou');
        $user->setEmail('akrem.boussaha@gmail.com');
        $user->setName('Akrem Boussaha');
        $user->setPassword("123");
        $this->addReference('user_admin', $user)
        $manager->persist($user);

        $manager->flush();
    }
}
