<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\NewsCategory;
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
                    ->addColumn('description', function ($news) {
                    
                        $shortDescription = Str::limit(strip_tags($news->description), 100);
    
                        return $shortDescription . (strlen($news->description) > 100 ? '...' : '');
                    })
                    ->addColumn('image', function ($news) {
                    
                        return '<div class="table-actions text-center">
                        <img src="' . asset('images/' . $news->image) . '" alt="Banner image" height="90px" width="150px" />
                        </div>';
                    })
                    ->addColumn('status', function ($news) {
                        if (Auth::user()->can('manage_user')) {
                            $button = '<label class="switch">';
                            $button .= ' <input type="checkbox" class="changeStatus" id="customSwitch' . $news->id . '" getId="' . $news->id . '" title="status"';
    
                            if ($news->type == 1) {
                                $button .= "checked";
                            }
                            $button .= ' ><span class="slider round"></span>';
                            $button .= '</label>';
                            return $button;
                        }else{
                            if($news->type == 1){
                                return '<span class="badge badge-success" title="Active">Active</span>';
                            }elseif($news->type == 0){
                                    return '<span class="badge badge-danger" title="Inactive">Inactive</span>';
                            }
                        }
    
                    })
                    ->addColumn('action', function ($news) {
                        if (Auth::user()->can('edit') && Auth::user()->can('delete')) {
                            return '<div class="table-actions text-center d-flex">
                                            <a href="' . route('news-page.news.edit', $news->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            <a type="submit" onclick="showDeleteConfirm(' . $news->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('edit')) {
                            return '<div class="table-actions">
                                            <a href="' . route('news-page.news.edit', $news->id) . '" title="Edit"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                            </div>';
                        } elseif (Auth::user()->can('delete')) {
                            return '<div class="table-actions">
                                            <a type="submit" onclick="showDeleteConfirm(' . $news->id . ')" title="Delete"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                            </div>';
                        }
                    })
                    ->addIndexColumn()
                    ->rawColumns(['status','description', 'image', 'action'])
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //news_category_id
        $this->validate($request, [
            'title'=> 'required',
            'news_category_id'=> 'required',
            'description'=> 'required',
            'image' => 'required',
        ]);

        try {
            if ($request->hasfile('image')) {
                $destinationPath = public_path('images/');
                $image = $this->imageUploadService->uploadImages($request->file('image'), $destinationPath);
            }

            News::create([
                'title' => $request->title,
                'news_category_id' => $request->news_category_id,
                'description' => $request->description,
                'image' => $image
            ]);
            return redirect()->route('news-page.news.index')->with('success','Article Added Successfully');
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
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $this->validate($request, [
            'title'=> 'required',
            'news_category_id'=> 'required',
            'description'=> 'required',
        ]);

        try {
            // $approachItem=ApproachItem::findOrFail($id);
            // Get the old image file name
            $oldImageFileName = $news->image;

            if ($request->hasFile('image')) {
                $destinationPath = public_path('images/');

                // Upload the new image
                $image = $this->imageUploadService->uploadImages($request->file('image'), $destinationPath);

                // Delete the old image if it exists
                $oldImagePath = $destinationPath . $oldImageFileName;
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $news->update([
                'title' => $request->title,
                'news_category_id' => $request->news_category_id,
                'description' => $request->description,
                'image' => $image ?? $oldImageFileName,
            ]);
            return redirect()->route('news-page.news.index')->with('success','Article Updated Successfully');
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
                // $news=News::findOrFail($id);

                $destinationPath = public_path('images/');
                $imageFileName = $news->image;
                $imagePath = $destinationPath . $imageFileName;
    
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
    
                $news->delete();
    
                return response()->json([
                    'success' => true,
                    'message' => 'Item Deleted Successfully.',
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
            $news=News::findOrFail($id);
            $news->type = $news->type == 1 ? 0 : 1;
            $news->update();

            if ($news->type == 1) {
                return response()->json([
                    'success' => true,
                    'message' => 'Status Enabled',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Status Disabled',
                ]);
            }
        }

    }
}
