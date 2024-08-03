<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permission\Group\IndexRequest;
use App\Http\Resources\PermissionGroupCollection;
use App\Models\PermissionGroup;
use Illuminate\Http\Request;

class PermissionGroupController extends Controller
{
    public function index(IndexRequest $request): PermissionGroupCollection
    {
        $result = PermissionGroup::filter($request->all())
            ->sort($request->input('sort', 'id'))
            ->paginate($request->input('per_page', 10), ['*'], 'page', $request->input('page', 1));

        return new PermissionGroupCollection($result);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $permissionGroup = PermissionGroup::create($data);

        return response()->json($permissionGroup, 201);
    }

    public function show(PermissionGroup $permissionGroup)
    {
        return response()->json($permissionGroup, 200);
    }

    public function update(Request $request, PermissionGroup $permissionGroup)
    {
        $data = $request->all();
        $permissionGroup->update($data);

        return response()->json($permissionGroup, 200);
    }

    public function destroy(PermissionGroup $permissionGroup)
    {
        $permissionGroup->delete();

        return response()->json(null, 204);
    }
}
