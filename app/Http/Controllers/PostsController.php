<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use View;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Session;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    public function postCreatePost(Request $request)
    {
        if (isset($request)) {
            // Validation
            $this->validate($request, [
                'post_title' => 'required',
                'post_excerpt' => 'required',
                'post_message' => 'required|max:1000',
                'post_image' => 'required'
            ]);

            $post = new Post;
            // Insert into title what has been requested
            $post->title = $request->post_title;
            $post->excerpt = $request->post_excerpt;
            $post->message = $request->post_message;
            $post->category_slug = $request->selected_category;

            if (Input::hasFile('post_image')) {
                $file = Input::file('post_image');
                $name = time() . '_' . $file->getClientOriginalName();

                $file->move('uploads', $name);
                $post->image = $name;
            }

            $post_exist = DB::table('posts')->where(['title' => $post->title,])->first();

            if (!$post_exist) {
                $request->user()->posts()->save($post);
            } else {
                return redirect('/admin/addposts')->with('failed', 'Such a post already exists');
            }
            return redirect('/admin/addposts')->with('success', 'Post added succesfully');
        }

    }

    public function postShowPosts()
    {
        $categories = Category::with('posts')->get();
        $posts = Post::paginate(6);

//        dd($categories);

        if ($posts != NULL) {
            return view('blog', compact('posts', 'categories'));
        }
    }

    public function postViewSinglePost($id)
    {
        $posts = DB::table('posts')->where('id', $id)->get();
        return view('post', compact('posts'));
    }

    public function postDeletePost(Request $request)
    {
        $id = $request->id;
        DB::table('posts')->where('id', $id)->delete();
        return redirect('/blog')->with('success', 'Post removed successfully');
    }

    public function postShowPostsOnPage()
    {
        $posts = Post::all();
        return $posts;

    }

    public function postGetPostData(Request $request)
    {
        $id = $request->id;

        $post = DB::table('posts')
            ->where('id', $id)
            ->get()[0];

        return view('/admin/edit-post', ['post' => $post]);
    }

    public function postEditPost(Request $request)
    {
        $title = $request->post_title;
        $message = $request->post_message;
        $excerpt = $request->post_excerpt;
        $category = $request->selected_category;
        $image = null;
        $id = null;

        if (Input::hasFile('post_image')) {
            $file = Input::file('post_image');
            $name = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads', $name);
            $image = $name;
        }

        $id = $request->post_id;

        $get_avatar_name = DB::table('posts')->where('id', $id)->select('image')->get()[0]->image;

        global $root_directory;

        $p_delim = DIRECTORY_SEPARATOR;
        $image_path = $root_directory . "{$p_delim}uploads{$p_delim}{$get_avatar_name}";

        if (\File::exists($image_path)) {
            \File::delete($image_path);
        }


        if ($image) {
            DB::table('posts')
                ->where('id', $id)
                ->update(['title' => $title, 'message' => $message, 'category_slug' => $category, 'excerpt' => $excerpt, 'image' => $image]);
        } else {
            DB::table('posts')
                ->where('id', $id)
                ->update(['title' => $title, 'message' => $message, 'excerpt' => $excerpt, 'category_slug' => $category]);
        }

        return redirect('/blog')->with('post-edited', 'Post has been edited succesfully');
    }

    public function postsCategoryPost($category)
    {
        $posts = DB::table('posts')->where('category_slug', $category)->paginate(6);

        $count = DB::table('posts')->where('category_id', 38)->get();

        if ($posts != NULL) {
            return view('blog', compact('posts', 'categories', 'count'));
        }
    }

    public function showCategoriesInAdmin()
    {
        $categories = DB::table('categories')->get();
        return $categories;
    }

    public function showCategoryForEdit($id)
    {
        $categories = DB::table('categories')
            ->where('id', $id)
            ->get()[0];

        return view('/admin/edit-category', ['categories' => $categories]);
    }

    public function postsCreateCategory(Request $request)
    {
        $cat_title = $request->category_title;
        $cat_slug = $request->category_slug;
        $cat_slug_edited = strtolower(str_replace(' ', '_', $cat_slug));

        $cat_exists = DB::table('categories')->where(['slug' => $cat_slug_edited])->first();

        if (!$cat_exists) {
            DB::table('categories')->insert(['title' => $cat_title, 'slug' => $cat_slug]);
        } else {
            return redirect('/admin/post-categories')->with('failed', 'Such a category already exists');
        }
        return view('/admin/categories');
    }

    public function postDeleteCategory(Request $request)
    {
        $category_to_delete = $request->category_id;
        DB::table('categories')->where('id', $category_to_delete)->delete();
        return redirect('/admin/post-categories')->with('success', 'Category removed successfully');
    }

    public function postEditCategory(Request $request)
    {
        $category_id = $request->category_id;
        $category_title = $request->category_title;
        $category_slug = $request->category_slug;

            DB::table('categories')->where('id', $category_id)->update(['title' => $category_title, 'slug' => $category_slug]);
            return redirect('/admin/post-categories')->with('success_edit', 'Category has been edited successfully');
    }

    public function postGetPostsCount()
    {
//        $count = DB::table('posts')->count('id')->where(['category_id' => 38])->get();

        return view('/blog', compact('count'));
    }
}
