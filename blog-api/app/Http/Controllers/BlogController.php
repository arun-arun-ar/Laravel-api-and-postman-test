<?php



namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::get();
        return response()->json([
            'message' => 'List of Posts',
            'posts'=> $blogs
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'category' => 'required|unique:blogs,category',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }


        $blog = new Blog;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category = $request->category;
        $blog->save();

        return response()->json([
            'message' => 'Blog post was successfully created',
            'posts'=> $blog
        ],200);

    }

    










    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return response()->json([
            'message' => 'Show Blog by ID',
            'posts'=> $blog
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->title = $request->title ?? $blog->title;
        $blog->description = $request->description ??$blog->description;
        $blog->category = $request->category ??$blog->category;
        $blog->save();

        return response()->json([
            'message' => 'Blog post was successfully updated',
            'posts'=> $blog
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        return response()->json([
            'message' => 'Blog post was successfully deleted',
            'posts'=> $blog->delete()
        ],200);
    }
}
