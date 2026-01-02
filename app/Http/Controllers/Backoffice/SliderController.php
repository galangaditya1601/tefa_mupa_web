<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\SliderRepository;
use App\Commons\Controller\BaseController;
use App\Schemas\SliderSchema;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class SliderController extends BaseController
{
    public function __construct(
        private SliderRepository $sliderRepository
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $sliders = $this->sliderRepository->paginate(request());
            return view('backoffice.pages.slider.index', compact('sliders'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to retrieve sliders.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.pages.slider.created');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            if (!$request->hasFile('file')) {
                return redirect()->back()->with('error', 'File is required');
            }

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $dateNow = now()->format('YmdHis');
            $name = $dateNow . '.' . $extension;

            $file->storeAs('images/slider', $name, 'public');
            $path_url = asset('storage/images/slider');

            $schema = new SliderSchema();
            $requestData = array_merge($request->all(), [
                'file' => $name,
                'path' => $path_url
            ]);
            $schema->hydrateSchemaBody($requestData);

            $slider = $this->sliderRepository->create($schema);
            return redirect()->route('sliders.index')->with('success', 'Slider created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Slider created failed: ' . $th->getMessage());
        }
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
        try {
            $slider = $this->sliderRepository->show($id);
            return view('backoffice.pages.slider.edit', compact('slider'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to retrieve slider: ' . $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $slider = $this->sliderRepository->show($id);

            $data = $request->all();
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $dateNow = now()->format('YmdHis');
                $newName = $dateNow . '.' . $extension;

                $file->storeAs('images/slider', $newName, 'public');
                if ($slider->file && Storage::disk('public')->exists('images/slider/' . $slider->file)) {
                    Storage::disk('public')->delete('images/slider/' . $slider->file);
                }
                $data['file'] = $newName;
            } else {
                $data['file'] = $slider->file;
            }

            $schema = new \App\Schemas\SliderSchema();
            $schema->hydrateSchemaBody($data);

            $this->sliderRepository->update($id, $schema);
            return redirect()->route('sliders.index')->with('success', 'Slider updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to update slider: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $find_data = $this->sliderRepository->show($id);
            if(!$find_data){
                return redirect()->back()->with('error', 'Slider not found');
            }
            $this->sliderRepository->delete($id);
            return redirect()->route('sliders.index')->with('success', 'Slider deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to delete slider: ' . $th->getMessage());
        }
    }
}
