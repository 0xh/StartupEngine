<?php

namespace App\Http\Controllers;
use App\ContentItem;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\Role;

class PageController extends Controller
{

    public function getHomepage() {
        $page =  \App\Page::where('slug', '=', 'home')->first();
        $page->slug = 'home';
        return view('pages.view')->with('page', $page);
    }

    public function getPage($slug) {
        $page =  \App\Page::where('slug', '=', $slug)->first();
        if ($page == null) {
            abort(404);
        }
        return view('pages.view')->with('page', $page);
    }

    public function editPage(Request $request, $id) {
        $adminrole = Role::where('name', '=', 'admin')->firstOrFail();
        if(\Auth::user() && \Auth::user()->role_id == $adminrole->id) {
            $page = \App\Page::find($id);
            return view('app.page.edit')->with('page', $page);
        }
        else {
            abort(404);
        }
    }

    public function index(Request $request) {
        $adminrole = Role::where('name', '=', 'admin')->firstOrFail();
        if(\Auth::user() && \Auth::user()->role_id == $adminrole->id) {
            if($request->input('s') !== null) {
                $pages = \App\Page::where('body', 'LIKE', '%'.$request->input('s').'%')->orWhere('title', 'ILIKE', '%'.$request->input('s').'%')->orWhere('excerpt', 'ILIKE', '%'.$request->input('s').'%')->limit(100)->orderBy('updated_at', 'desc')->get();
            }
            else {
                $pages = Page::all();
            }
            return view('app.page.index')->with('pages', $pages);
        }
        else {
            abort(404);
        }
    }

}