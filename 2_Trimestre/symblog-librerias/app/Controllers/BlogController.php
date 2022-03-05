<?php

namespace App\Controllers;

use App\Models\Blog;
use Laminas\Diactoros\Response\HtmlResponse as HtmlResponse;


class BlogController extends BaseController
{

    public function indexAction()
    {
        $posts = Blog::all();
        var_dump($posts);
        return $this->renderHTML('index.html.twig', [
            'posts' => $posts
        ]);
    }

    public function showBlogAction($request)
    {
        $uri=  explode('/',$request->getRequestTarget());
        $id = end ($uri);

        $blog = Blog::find($id);
        $comentarios = Blog::find($id)->comentarios;
        return $this->renderHTML('blog.html.twig', [
            'blog' => $blog,
            'comentarios' => $comentarios
        ]);
    }

    /* public function showBlogAction($request)
    {
        $blog = 
        $post = $blog->getPost($args['id']);
        return $this->renderHTML('post.html.twig', [
            'post' => $post
        ]);
    } */
}