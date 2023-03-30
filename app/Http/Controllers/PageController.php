<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class PageController extends Controller
{
    public function index() {
        $items = Item::orderByDesc('id')->limit(5)->get();
        return view('pages.index', compact('items'));
    }

    public function login() {
        return view('pages.login');
    }

    public function register() {
        return view('pages.register');
    }

    public function request() {
        return view('pages.request');
    }

    public function delivery() {
        return view('pages.delivery');
    }

    public function about() {
        return view('pages.about');
    }

    public function location() {
        return view('pages.location');
    }

    public function Search_by_car_name() {
        return view('pages.Search_by_car_name');
    }

    public function list(Request $request) {

        $sort = $request->get('sort', 'id');
        $type = $request->get('type', 'desc');
        $quantity = $request->get('quantity', 'quan');
        $categoryId = $request->get('category_id', null);

        $categories = Category::get();

        $items = Item::orderBy($sort, $type,);

        if ($categoryId) {
            $items = $items->where('category_id', $categoryId);
        }

        $items = $items->where('quantity', '>', 0)->simplePaginate(15);

        return view('pages.list', compact('sort', 'type','quantity' , 'categoryId', 'categories', 'items'));
    }

    public function show(Item $item) {
        return view('pages.show', compact('item'));
    }

}
