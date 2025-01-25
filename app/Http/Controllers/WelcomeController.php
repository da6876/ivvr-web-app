<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $menuId = request()->input('ViewType');
        if ($menuId){
            return $menuId;
        }else{
            return view('welcome');
        }
    }
    public function index1($menuId)
    {
        $jsonPath = public_path('menu.json');
        if (file_exists($jsonPath)) {
            $jsonContent = file_get_contents($jsonPath);
            $menu = json_decode($jsonContent, true);
        } else {
            echo 'Menu JSON file not found.';
            exit;
        }
        $childMenuItems = array_filter($menu['menu'], function($item) use ($menuId) {
            return $item['parent_id'] === $menuId;
        });

        $childMenuItems = array_values($childMenuItems);

        return view('welcome1', compact('childMenuItems', 'menuId'));
    }
    public function getDashboard()
    {
        $menuId = request()->input('menuid');
        session(['menuid' => $menuId]);

        return response()->json([
            'statusCode' => 200,
            'route' => url('/dashboard') // Return the absolute URL for the dashboard route
        ]);
    }
    public function dashboard()
    {
        return view('admin.home');
    }
    public function userInfo()
    {
        return view('admin.home');
    }
    public function userType()
    {
        return view('admin.home');
    }

}
