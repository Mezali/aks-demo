<?php

namespace App\Http\Controllers;

use App\Models\StationaryBucketGallery;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

use App\Http\Requests\StationaryBucket\Gallery\{
    IndexRequest,
    StoreRequest,
    UpdateRequest
};
use App\Http\Resources\{
    StationaryBucketGalleryCollection,
    StationaryBucketGalleryResource
};

class StationaryBucketGalleryController extends Controller
{
    /**
     * Index
     */
    public function index(IndexRequest $request): StationaryBucketGalleryCollection
    {
        $result = StationaryBucketGallery::filter($request->all())
            ->sort($request->input('sort', 'id'))
            ->paginate($request->input('per_page',), ['*'], 'page', $request->input('page', 1));
        return new StationaryBucketGalleryCollection($result);
    }

    /**
     * Store
     */
    public function store(StoreRequest $request)
    {
        $data = json_decode($request->urls);
        if ($data) {
            foreach ($data as $item) {
                StationaryBucketGallery::create([
                    'url' => $item->url,
                    'stationary_bucket_group_id' => $request->group_id,
                ]);
            }
            return response()->json(['message' => 'Images uploaded successfully'], 200);
        } else {
            return response()->json(['message' => 'Invalid JSON data'], 400);
        }
    }

    /**
     * Show
     */
    public function show(StationaryBucketGallery $stationaryBucketGallery): StationaryBucketGalleryResource
    {
        if (!auth()->user()) {
            throw new UnauthorizedException();
        }

        return new StationaryBucketGalleryResource($stationaryBucketGallery);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, StationaryBucketGallery $stationaryBucketGallery): StationaryBucketGalleryResource
    {
        if ($request->has('id')) {
            $stationaryBucketGallery->setUser($request->id);
        }
        if ($request->has('stationary_bucket_group_id')) {
            $stationaryBucketGallery->setUser($request->stationary_bucket_group_id);
        }
        if ($request->has('url')) {
            $stationaryBucketGallery->url = $request->url;
        }
        if ($request->has('is_main')) {
            $stationaryBucketGallery->is_main = $request->is_main;
        }
        if ($stationaryBucketGallery->save()) {
            return new StationaryBucketGalleryResource($stationaryBucketGallery);
        } else {
            return response()->json(['message' => 'Error updating Image'], 422);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StationaryBucketGallery $stationaryBucketGallery)
    {
        if ($stationaryBucketGallery->delete()) {
            return response()->json(['message' => 'Image deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Error deleting Image'], 500);
        }
    }
}
