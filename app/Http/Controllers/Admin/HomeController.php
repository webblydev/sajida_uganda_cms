<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePageManager;
use App\Models\AboutPageManager;
use App\Models\NewsPageManager;

class HomeController extends Controller
{
    public function home(){
        $homePageManager=HomePageManager::latest()->first(); 
        return view('pages.home.index',compact('homePageManager'));
    }
    public function aboutUs(){
        $aboutPageManager=AboutPageManager::latest()->first(); 
        return view('pages.about-us.index',compact('aboutPageManager'));
    }
    public function news(){
        $newsPageManager=NewsPageManager::latest()->first(); 
        return view('pages.news.index',compact('newsPageManager'));
    }

    public function showHide(Request $request, $id)
    {
        if ($request->ajax()) {

            $homePageManager=HomePageManager::latest()->first(); 

            if ($id==2) {
                $homePageManager->section_2 = $homePageManager->section_2  == 1 ? 0 : 1;
            }
            if ($id==3) {
                $homePageManager->section_3 = $homePageManager->section_3  == 1 ? 0 : 1;
            }
            if ($id==4) {
                $homePageManager->section_4 = $homePageManager->section_4  == 1 ? 0 : 1;
            }
            if ($id==5) {
                $homePageManager->section_5 = $homePageManager->section_5  == 1 ? 0 : 1;
            }
            if ($id==6) {
                $homePageManager->section_6 = $homePageManager->section_6  == 1 ? 0 : 1;
            }
            if ($id==7) {
                $homePageManager->section_7 = $homePageManager->section_7  == 1 ? 0 : 1;
            }

            $homePageManager->update();

            if ($homePageManager) {
                return response()->json([
                    'success' => true,
                    'message' => 'Status updated successfully',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Something Went wrong',
                ]);
            }
        }
    }

    public function aboutPageshowHide(Request $request, $id)
    {
        if ($request->ajax()) {

            $aboutPageManager=AboutPageManager::latest()->first(); 

            if ($id==2) {
                $aboutPageManager->section_2 = $aboutPageManager->section_2  == 1 ? 0 : 1;
            }
            if ($id==3) {
                $aboutPageManager->section_3 = $aboutPageManager->section_3  == 1 ? 0 : 1;
            }
            if ($id==4) {
                $aboutPageManager->section_4 = $aboutPageManager->section_4  == 1 ? 0 : 1;
            }
            if ($id==5) {
                $aboutPageManager->section_5 = $aboutPageManager->section_5  == 1 ? 0 : 1;
            }
            if ($id==6) {
                $aboutPageManager->section_6 = $aboutPageManager->section_6  == 1 ? 0 : 1;
            }
            if ($id==7) {
                $aboutPageManager->section_7 = $aboutPageManager->section_7  == 1 ? 0 : 1;
            }
            if ($id==8) {
                $aboutPageManager->section_8 = $aboutPageManager->section_8  == 1 ? 0 : 1;
            }
            if ($id==9) {
                $aboutPageManager->section_9 = $aboutPageManager->section_9  == 1 ? 0 : 1;
            }

            $aboutPageManager->update();

            if ($aboutPageManager) {
                return response()->json([
                    'success' => true,
                    'message' => 'Status updated successfully',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Something Went wrong',
                ]);
            }
        }
    }
    public function newsPageshowHide(Request $request, $id)
    {
        if ($request->ajax()) {

            $newsPageManager=NewsPageManager::latest()->first(); 

            if ($id==2) {
                $newsPageManager->section_2 = $newsPageManager->section_2  == 1 ? 0 : 1;
            }
            if ($id==3) {
                $newsPageManager->section_3 = $newsPageManager->section_3  == 1 ? 0 : 1;
            }

            $newsPageManager->update();

            if ($newsPageManager) {
                return response()->json([
                    'success' => true,
                    'message' => 'Status updated successfully',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Something Went wrong',
                ]);
            }
        }
    }

}
