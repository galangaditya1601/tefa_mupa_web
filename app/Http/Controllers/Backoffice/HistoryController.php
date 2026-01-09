<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Commons\Controller\BaseController;
use App\Repositories\HistoryRepository;

class HistoryController extends BaseController
{

    public function __construct(
        protected HistoryRepository $historyRepository
    )
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $history = $this->historyRepository->findFirst();
           return view('backoffice.pages.history.index',compact('history'));
        } catch (\Throwable $th) {
            \Illuminate\Support\Facades\Log::error($th);
            return redirect()->back()->withErrors('error','Error'.$th);
        }
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
        try {
            $findContent = $this->historyRepository->show($id);
            if (!$findContent) {
                return redirect()->back()->with('error', 'History not found');
            }

            $payload = $request->all();

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $name = now()->format('YmdHis');
                $filename = $name . '.' . $extension;

                $file->storeAs('image/history', $filename, 'public');
                $payload['image'] = $filename;
                $payload['path'] = asset('storage/image/history/' . $filename);
            } else {
                $payload['image'] = $findContent->image;
                $payload['path'] = $findContent->path;
            }

            $payload['body'] = $request->input('body');
            $payload['title'] = $request->input('title');

            $schema = new \App\Schemas\HistorySchema();
            $schema->hydrateSchemaBody($payload);
            $validator = $schema->validate();

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $schema->hydrateBody();
            $this->historyRepository->updateData($id, $payload);

            return redirect()->route('history.index')->with('success', 'History updated successfully');
        } catch (\Throwable $th) {
            \Illuminate\Support\Facades\Log::error($th);
            return redirect()->back()->with('error', 'Failed to update history: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
