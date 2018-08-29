<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostsController extends Controller
{
    public function index(RegistryInterface $doctrine)
    {
        $posts = $doctrine->getRepository(Post::class)->findAll();

        return $this->render('posts/index.html.twig', compact('posts'));
        // [
        //     'controller_name' => 'PostsController',
        // ]);
    }
}
