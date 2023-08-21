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
        $viewParameters = [];

        $pageTitle = 'New Notice';

        $viewParameters[] = 'pageTitle';

        return view('notices.create', compact($viewParameters));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'contents' => 'required',
        ]);

        $contents = $request->contents;
        $link = $request->link;
        $color = $request->color;
        $isActive = $request->is_active ?? 0;

        $notice = new Notice;
        $notice->contents = $contents;
        $notice->link = $link;
        $notice->color = $color;
        $notice->is_active = $isActive;

        $notice->save();
         
        return redirect()->route('notices.create')
                        ->with('actionHead','WoW!')
                        ->with('actionMsg','Notice created successfully.');
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
    public function edit(Notice $notice)
    {
        $viewParameters = [];

        $pageTitle = 'Edit Notice';

        $viewParameters[] = 'pageTitle';
        $viewParameters[] = 'notice';

        return view('notices.edit', compact($viewParameters));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'contents' => 'required',
        ]);

        $contents = $request->contents;
        $link = $request->link;
        $color = $request->color;
        $isActive = $request->is_active ?? 0;

        $notice->contents = $contents;
        $notice->link = $link;
        $notice->color = $color;
        $notice->is_active = $isActive;

        $notice->update();
         
        return redirect()->route('notices.edit', ['notice' => $notice->id])
                        ->with('actionHead','WoW!')
                        ->with('actionMsg','Notice udpated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
