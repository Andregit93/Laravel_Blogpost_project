<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('admin') || Gate::allows('superAdmin')) {
            return view("dashboard.blog.index", [
                'posts' => Post::orderBy('updated_at', 'desc')->paginate(10)->withQueryString(),
            ]);
        }

        abort(403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if (!$post) {
            abort(404);
        }

        return view('dashboard.blog.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('dashboard.blog.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // Cari postingan berdasarkan slug
        $post = Post::where('slug', $slug)->first();

        // Periksa apakah postingan ditemukan
        if ($post) {
            // Validasi input data sebelum update
            $rules = [
                'title' => 'required|max:255',
                'image' => 'image|file|max:1024',
                'body' => 'required',
                'slug' => ['required', Rule::unique('posts')->ignore($post->id)],
            ];

            // Tambahkan data excerpt (jika diperlukan)
            $validatedData = $request->validate($rules);
            $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);

            // Cek apakah ada file gambar baru yang diupload
            if ($request->hasFile('image')) {
                if ($post->image) {
                    Storage::delete($post->image);
                }

                // Upload gambar baru dan simpan path-nya
                $imagePath = $request->file('image')->store('post-images');
                $validatedData['image'] = $imagePath;
            } else {
                // Jika tidak ada gambar baru diupload, gunakan gambar lama
                $validatedData['image'] = $post->image;
            }

            // Perbarui data postingan berdasarkan input dari form
            $post->update($validatedData);

            return redirect('/dashboard/blog')->with('success', 'Post has been updated!');
        } else {
            return back()->with('updateError', 'Post not found!');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if ($post) {
            // mengambil nomor halaman
            session()->put('currentPage', request('page'));

            if ($post->image) {
                Storage::delete($post->image);
            }

            Post::destroy($post->id);

            return redirect()->back()->with('deleteSuccess', 'Post has been deleted!');
        } else {
            return redirect()->back()->with('deleteError', 'Post not found!');
        }
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
