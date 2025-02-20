<?php

namespace App\Http\Controllers\Frontend;

use App\Models\News;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    // Display a listing of the news articles.
    public function index()
    {
        $news = News::all(); // Retrieve all news articles
        return view('frontend.news.index', compact('news')); 
    }

    // Show the form for creating a new news article.
    public function create()
    {
        return view('frontend.news.create'); 
    }

    // Store a newly created news article in storage.
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'splash' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'type' => 'required|in:Breaking,Regular,Headline',
            'meta' => 'nullable|string|max:256',
            'division' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'subdistrict' => 'nullable|string|max:255',
            'headline' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'categories' => 'nullable|array',
            'content' => 'required|string',
            'date' => 'required|date',
            'reporter_id' => 'required|exists:users,id',
            'published_at' => 'nullable|date',
            'views' => 'nullable|integer|min:0',
            'status' => 'required|in:Draft,Pending Approval,Published,Rejected',
        ]);

        // Handle file uploads (thumbnail, splash)
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('images/thumbnails', 'public');
        }

        if ($request->hasFile('splash')) {
            $validated['splash'] = $request->file('splash')->store('images/splash', 'public');
        }

        // Create the news article
        News::create($validated);

        // Redirect back with success message
        return redirect()->route('news.index')->with('success', 'News article created successfully!');
    }

    // Display the specified news article.
    public function show(News $news)
    {
        return view('frontend.news.show', compact('news')); // Display the news article details
    }

    // Show the form for editing the specified news article.
    public function edit($news)
    {
        $news = News::findOrFail($news); // Corrected method name
        return view('frontend.news.edit', compact('news')); // Return the form for editing a news article
    }

    // Update the specified news article in storage.
    public function update(Request $request, News $news)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'splash' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'type' => 'required|in:Breaking,Regular,Headline',
            'meta' => 'nullable|string|max:256',
            'division' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'subdistrict' => 'nullable|string|max:255',
            'headline' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'categories' => 'nullable|array',
            'content' => 'required|string',
            'date' => 'required|date',
            'reporter_id' => 'required|exists:users,id',
            'published_at' => 'nullable|date',
            'views' => 'nullable|integer|min:0',
            'status' => 'required|in:Draft,Pending Approval,Published,Rejected',
        ]);

        // Handle file uploads (thumbnail, splash)
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('images/thumbnails', 'public');
        }

        if ($request->hasFile('splash')) {
            $validated['splash'] = $request->file('splash')->store('images/splash', 'public');
        }

        // Update the news article
        $news->update($validated);

        // Redirect back with success message
        return redirect()->route('news.index')->with('success', 'News article updated successfully!');
    }

    // Remove the specified news article from storage.
    public function destroy(News $news)
    {
        // Delete the news article
        $news->delete();

        // Redirect back with success message
        return redirect()->route('news.index')->with('success', 'News article deleted successfully!');
    }
}
