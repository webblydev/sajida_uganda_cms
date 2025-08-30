<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\NewsCategory;
use App\Http\Requests\NewsRequest;
use Validator;
use DataTables;
use Auth;
use Image;
use DB;
use Illuminate\Support\Str;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    protected $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if (request()->ajax()) {
                $newsItems = News::with('category')->latest()->get();

                return DataTables::of($newsItems)
                    ->addColumn('title', function ($news) {
                        return $news->title ?? '';
                    })
                    ->addColumn('category', function ($news) {
                        return $news->category->title ?? '';
                    })
                    ->addColumn('paragraph_one', function ($news) {
                        $shortDescription = Str::limit(strip_tags($news->paragraph_one), 100);
                        return $shortDescription . (strlen($news->paragraph_one) > 100 ? '...' : '');
                    })
                    ->addColumn('thumbnail', function ($news) {
                        return '<div class="table-actions text-center">
                        <img src="' . asset('images/' . $news->thumbnail_image) . '" alt="Thumbnail image" height="90px" width="150px" />
                        </div>';
                    })
                    ->addColumn('status', function ($news) {
                        if (Auth::user()->can('manage_user')) {
                            $button = '<label class="switch">';
                            $button .= ' <input type="checkbox" class="changeStatus" id="customSwitch' . $news->id . '" data-id="' . $news->id . '" title="status"';
                            if ($news->type == 1) {
                                $button .= " checked";
                            }
                            $button .= ' ><span class="slider round"></span>';
                            $button .= '</label>';
                            return $button;
                        } else {
                            if ($news->type == 1) {
                                return '<span class="badge badge-success" title="Featured">Featured</span>';
                            } elseif ($news->type == 2) {
                                return '<span class="badge badge-warning" title="Special">Special</span>';
                            } else {
                                return '<span class="badge badge-info" title="Recent">Recent</span>';
                            }
                        }
                    })
                    ->addColumn('action', function ($news) {
                        $actions = '<div class="table-actions text-center d-flex">';
                        
                        // View action
                        $actions .= '<a href="' . route('news-page.news.show', $news->id) . '" title="View"><i class="ik ik-eye f-16 mr-15 text-blue"></i></a>';
                        
                        if (Auth::user()->can('edit')) {
                            $actions .= '<a href="' . route('news-page.news.edit', $news->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>';
                        }
                        if (Auth::user()->can('delete')) {
                            $actions .= '<a type="submit" onclick="showDeleteConfirm(' . $news->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>';
                        }
                        $actions .= '</div>';
                        return $actions;
                    })
                    ->addIndexColumn()
                    ->rawColumns(['status', 'paragraph_one', 'thumbnail', 'action'])
                    ->make(true);
            }
            return view('news.article.index');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newsCategories = NewsCategory::latest()->get();
        return view('news.article.create', compact('newsCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\NewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        try {
            $destinationPath = public_path('images/');
            
            $bannerImage = null;
            $thumbnailImage = null;
            $articleImage = null;

            if ($request->hasFile('banner_image')) {
                $bannerImage = $this->imageUploadService->uploadImages($request->file('banner_image'), $destinationPath);
            }

            if ($request->hasFile('thumbnail_image')) {
                $thumbnailImage = $this->imageUploadService->uploadImages($request->file('thumbnail_image'), $destinationPath);
            }

            if ($request->hasFile('article_image')) {
                $articleImage = $this->imageUploadService->uploadImages($request->file('article_image'), $destinationPath);
            }

            News::create([
                'title' => $request->title,
                'news_category_id' => $request->news_category_id,
                'banner_image' => $bannerImage,
                'thumbnail_image' => $thumbnailImage,
                'article_image' => $articleImage,
                'paragraph_one' => $request->paragraph_one,
                'paragraph_two' => $request->paragraph_two,
                'paragraph_three' => $request->paragraph_three,
                'type' => 0, // Default to recent
            ]);

            return redirect()->route('news-page.news.index')->with('success', 'Article Added Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news.article.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $newsCategories = NewsCategory::latest()->get();
        return view('news.article.edit', compact('newsCategories','news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\NewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, News $news)
    {
        try {
            $destinationPath = public_path('images/');
            
            // Get current image file names
            $bannerImage = $news->banner_image;
            $thumbnailImage = $news->thumbnail_image;
            $articleImage = $news->article_image;

            // Handle banner image upload
            if ($request->hasFile('banner_image')) {
                $newBannerImage = $this->imageUploadService->uploadImages($request->file('banner_image'), $destinationPath);
                
                // Delete old banner image
                $oldBannerPath = $destinationPath . $bannerImage;
                if (File::exists($oldBannerPath)) {
                    File::delete($oldBannerPath);
                }
                $bannerImage = $newBannerImage;
            }

            // Handle thumbnail image upload
            if ($request->hasFile('thumbnail_image')) {
                $newThumbnailImage = $this->imageUploadService->uploadImages($request->file('thumbnail_image'), $destinationPath);
                
                // Delete old thumbnail image
                $oldThumbnailPath = $destinationPath . $thumbnailImage;
                if (File::exists($oldThumbnailPath)) {
                    File::delete($oldThumbnailPath);
                }
                $thumbnailImage = $newThumbnailImage;
            }

            // Handle article image upload
            if ($request->hasFile('article_image')) {
                $newArticleImage = $this->imageUploadService->uploadImages($request->file('article_image'), $destinationPath);
                
                // Delete old article image
                $oldArticlePath = $destinationPath . $articleImage;
                if (File::exists($oldArticlePath)) {
                    File::delete($oldArticlePath);
                }
                $articleImage = $newArticleImage;
            }

            $news->update([
                'title' => $request->title,
                'news_category_id' => $request->news_category_id,
                'banner_image' => $bannerImage,
                'thumbnail_image' => $thumbnailImage,
                'article_image' => $articleImage,
                'paragraph_one' => $request->paragraph_one,
                'paragraph_two' => $request->paragraph_two,
                'paragraph_three' => $request->paragraph_three,
            ]);

            return redirect()->route('news-page.news.index')->with('success', 'Article Updated Successfully');
        } catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, News $news)
    {
        if ($request->ajax()) {
            try {
                $destinationPath = public_path('images/');
                
                // Delete all associated images
                $imagesToDelete = [
                    $news->banner_image,
                    $news->thumbnail_image,
                    $news->article_image
                ];

                foreach ($imagesToDelete as $imageFileName) {
                    if ($imageFileName) {
                        $imagePath = $destinationPath . $imageFileName;
                        if (File::exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                }

                $news->delete();

                return response()->json([
                    'success' => true,
                    'message' => 'Article Deleted Successfully.',
                ]);
            } catch (\Exception $e) {
                $bug = $e->getMessage();
                return response()->json([
                    'success' => false,
                    'message' => $bug,
                ]);
            }
        }
    }

    public function updateStatus(Request $request, $id)
    {
        if ($request->ajax()) {
            try {
                $news = News::findOrFail($id);
                
                // Toggle between types: 0 (recent) -> 1 (featured) -> 2 (special) -> 0
                $news->type = ($news->type + 1) % 3;
                $news->save();

                $statusMessages = [
                    0 => 'Status set to Recent',
                    1 => 'Status set to Featured', 
                    2 => 'Status set to Special'
                ];

                return response()->json([
                    'success' => true,
                    'message' => $statusMessages[$news->type],
                    'type' => $news->type
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                ]);
            }
        }
    }

    /**
     * Get news by category for frontend
     */
    public function getNewsByCategory($categoryId)
    {
        try {
            $news = News::with('category')
                ->where('news_category_id', $categoryId)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            
            return response()->json([
                'success' => true,
                'data' => $news
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Get featured news
     */
    public function getFeaturedNews()
    {
        try {
            $featuredNews = News::with('category')
                ->where('type', 1)
                ->orderBy('created_at', 'desc')
                ->get();
            
            return response()->json([
                'success' => true,
                'data' => $featuredNews
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Search news
     */
    public function searchNews(Request $request)
    {
        try {
            $query = $request->get('q');
            
            $news = News::with('category')
                ->where('title', 'LIKE', "%{$query}%")
                ->orWhere('paragraph_one', 'LIKE', "%{$query}%")
                ->orWhere('paragraph_two', 'LIKE', "%{$query}%")
                ->orWhere('paragraph_three', 'LIKE', "%{$query}%")
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            
            return response()->json([
                'success' => true,
                'data' => $news
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
