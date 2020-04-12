<?php

namespace App\Controller;

use App\Document\BlogPost;
use Doctrine\ODM\MongoDB\DocumentManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blog")
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/{page}", name="blog_list", defaults={"page": 5}, requirements={"page"="\d+"})
     */
    public function list($page = 1, Request $request, DocumentManager $dm)
    {
        $limit = $request->get('limit', 10);
        $repository = $dm->getRepository(BlogPost::class);
        $items = $repository->findAll();
        return $this->json(
                [
                    'items' => $items,
                    'page' =>  $page,
                    'limit' => $limit,
                    'data' => array_map(function(BlogPost $item) {
                        return $this->generateUrl('blog_by_slug', ['slug' => $item->getSlug()]);
                    }, $items)
                ]
            );
    }

    /**
     * @Route("/page/{id}", name="blog_by_id")
     */
    public function post(BlogPost $post, DocumentManager $dm)
    {
        return $this->json($post);

    }

    /**
     * @Route("/page-slug/{slug}", name="blog_by_slug")
     */
    public function postBySLug(BlogPost $post, DocumentManager $dm)
    {
        //same like findOneBy(['slug'=>$slug])
        return $this->json($post);
    }

    /**
     * @Route("/add", name="blog_add", methods={"POST"})
     */
    public function add(Request $request, DocumentManager $dm)
    {
        $serializer = $this->get('serializer');
        $blogPost = $serializer->deserialize($request->getContent(), BlogPost::class, 'json');
        $dm->persist($blogPost);
        $dm->flush();
        return $this->json($blogPost);
    }

    /**
     * @Route("/post/{id}", name="blog_delete", methods={"DELETE"})
     */
    public function delete(BlogPost $post, DocumentManager $dm)
    {
        $dm->remove($post);
        $dm->flush();
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}