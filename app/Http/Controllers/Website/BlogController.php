<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WP_Query;

class BlogController extends Controller
{
    public function __construct()
    {
        if (class_exists('WP_Query')) {
            $recentPosts = new WP_Query();
            $recentPosts->query('showposts=8');

            view()->composer('project.general', function ($view) {
                $view->with('page', 'blog');
            });

            view()->composer('blog.sidebar', function ($view) use ($recentPosts) {
                $view->with('recentPosts', $recentPosts);
            });
        } else {
            echo 'Blog não instalado corretamente';
        }
    }

    public function index()
    {
        $wordpress = new WP_Query(
            [
              'posts_per_page' => 10,
              'order'          => 'ASC',
              'orderby'        => 'post_title',
            ]);

        return view('blog.index', ['wordpress' => $wordpress, 'title' => 'Desastronautas']);
    }

    public function single($slug)
    {
        $query = new WP_Query(
            [
              'name'      => $slug,
              'post_type' => 'any',
            ]);

        if ($query->have_posts()) {
            $query->the_post();

            return view('blog.single');
        } else {
            return view('blog.empty');
        }
    }

    public function category($category)
    {
        $wordpress = new WP_Query(['category' => $category]);

        return view('blog.index', ['wordpress' => $wordpress, 'title' => get_category_by_slug($category)->name]);
    }

    public function tag($tag)
    {
        $wordpress = new WP_Query(['tag' => $tag]);

        return view('blog.index', ['wordpress' => $wordpress, 'title' => 'Posts com '.$tag]);
    }

    public function search(Request $request)
    {
        $wordpress = new WP_Query(['s' => $request->s]);

        return view('blog.index', ['wordpress' => $wordpress, 'title' => 'Busca por '.$request->s]);
    }

    public function author($author)
    {
        $wordpress = new WP_Query(['author' => $author]);

        return view('blog.index', ['wordpress' => $wordpress, 'title' => 'Posts de '.get_user_by('slug', $author)->data->display_name]);
    }
}
