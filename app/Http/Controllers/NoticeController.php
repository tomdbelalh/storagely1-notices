<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    private $returnData = ['id', 'contents', 'link', 'color', 'is_active', 'created_by'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewParameters = [];

        $pageTitle = 'Notices Home';
        $notices = Notice::get($this->returnData);

        $viewParameters[] = 'pageTitle';
        $viewParameters[] = 'notices';

        return view('notices.index', compact($viewParameters));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
