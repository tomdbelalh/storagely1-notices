<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class SiteController extends Controller
{
    private $returnData = ['id', 'contents', 'link', 'color', 'is_active', 'created_by'];

    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $viewParameters = [];

        $pageTitle = 'Notices Home';
        $notices = Notice::where('is_active', 1)->get($this->returnData);

        $viewParameters[] = 'pageTitle';
        $viewParameters[] = 'notices';

        return view('home', compact($viewParameters));
    }
}
