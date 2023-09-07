<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpacemenRequest;
use App\Http\Requests\UpdateSpacemenRequest;
use App\Models\Spacemen;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SpacemensController extends Controller
{
    public function index(): View
    {
        $this->authorize('view spacemen module');
        return view('pages.spacemens.index');
    }

    // render page for add spacemens
    public function create(): View
    {
        $this->authorize('add spacemen');
        return view('pages.spacemens.create');
    }

    // store record in the database
    public function store(CreateSpacemenRequest $request): RedirectResponse
    {
        // validate inputs
        $request->validated();
        // create spacemen in the database
        Spacemen::create([
            'spacemen' => $request['spacemen'],
            'user_id' => auth()->id()
        ]);
        return to_route('spacemens.index')->with('success', 'A new spacemen has been add!');
    }

    // show single record
    public function show(Spacemen $spacemen): View
    {
        $this->authorize('view spacemen');
        return view('pages.spacemens.show', compact('spacemen'));
    }

    public function edit(Spacemen $spacemen): View
    {
        $this->authorize('edit spacemen');
        return view('pages.spacemens.edit', compact('spacemen'));
    }

    public function update(UpdateSpacemenRequest $request, Spacemen $spacemen): RedirectResponse
    {
        // validate inputs
        $request->validated();
        // update records
        $spacemen->update([
            'spacemen' => $request['spacemen'],
            'user_id' => auth()->id()
        ]);

        return to_route('spacemens.show', $spacemen);
    }

    public function destroy(Spacemen $spacemen): RedirectResponse
    {
        $this->authorize('delete spacemen');
        $spacemen->delete();
        return to_route('spacemens.index');
    }
}
