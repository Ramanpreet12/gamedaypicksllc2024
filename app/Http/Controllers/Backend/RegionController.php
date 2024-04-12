<?php

namespace App\Http\Controllers\Backend;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Requests\RegionRequest;
use App\Http\Controllers\Controller;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::get();

        return view('backend.region.index' , compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.region.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionRequest $request)
    {
        if ($request->isMethod('post')) {
            Region::create([
                'region' => $request->region,
                'position' => $request->position,
                'status' => $request->status
            ]);
            return redirect()->route('region.index')->with('success' , 'Region Added Successfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region = Region::find($id);
      return view('backend.region.edit' , compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(RegionRequest $request, $id)
    {
        if ($request->isMethod('put')) {
            Region::where('id' , $id)->update([
                'region' => $request->region,
                'position' => $request->position,
                'status' => $request->status
            ]);
            return redirect()->route('region.index')->with('success' , 'Region Updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Region::find($id)->delete();
        // return redirect()->route('region.index')->with('success' , 'Region Delete Successfully');
    }

    public function deleteRegion($id)
    {
        Region::find($id)->delete();
        return redirect()->route('region.index')->with('success' , 'Region Delete Successfully');
    }


}
