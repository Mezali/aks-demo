<?php

namespace App\Http\Controllers;

use App\Models\City;

use App\Http\Requests\City\{
    IndexRequest,
    ShowRequest
};
use App\Http\Resources\{
    CityCollection,
    CityResource
};
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Index    
     */
    public function index(IndexRequest $request): CityCollection
    {
        $cities =
            City::filter($request->all())
            ->sort($request->input('sort', 'id'))
            ->paginate($request->input('per_page', 10), ['*'], 'page', $request->input('page', 1));
        return new CityCollection($cities);
    }

    /**
     * Show
     */
    public function show(ShowRequest $request, City $city): CityResource
    {
        return new CityResource($city);
    }

    private function transformData($inputArray)
    {
        $transformedData = [
            "data" => [],
            "summary" => []
        ];

        foreach ($inputArray as $item) {
            $stateName = $item['state']['name'];
            $stateAcronym = $item['state']['acronym'];
            $stateId = $item['state']['id'];

            // Prepare the state name formats
            $stateFullName = $stateAcronym . ' - ' . $stateName;
            $stateOnlyName = $stateName;

            // Prepare the item details
            $itemDetails = [
                "id" => (string) $item['id'],
                "state_id" => (string) $item['state_id'],
                "NAME" => $item['name'],
                "state_name" => $stateFullName,
                "state_only_name" => $stateOnlyName
            ];

            // Check if the state already exists in transformedData
            $stateExists = false;
            foreach ($transformedData['data'] as &$stateData) {
                if ($stateData['state'] === $stateName) {
                    $stateExists = true;
                    $stateData['list'][] = $itemDetails;
                    break;
                }
            }
            unset($stateData); // Unset the reference to avoid accidental modification

            // If state does not exist, create a new entry
            if (!$stateExists) {
                $transformedData['data'][] = [
                    "state" => $stateName,
                    "list" => [$itemDetails]
                ];
            }

            // Update summary count for the state
            if (!isset($transformedData['summary'][$stateName])) {
                $transformedData['summary'][$stateName] = ["QTDE" => "0"];
            }
            $transformedData['summary'][$stateName]["QTDE"] = (string) (intval($transformedData['summary'][$stateName]["QTDE"]) + 1);
        }

        return $transformedData;
    }

    public function update(Request $request, City $city): CityResource
    {

        if ($request->has('receive_only_finished')) {
            $city->receive_only_finished = $request->receive_only_finished;
        }

        if ($city->save()) {
            return new CityResource($city);
        } else {
            return response()->json(['message' => 'Error updating residue'], 500);
        }
    }

    public function lists(IndexRequest $request) 
    {        
        $cities =
            City::filter($request->all())
            ->sort('id')
            ->get();

        return $this->transformData($cities->toArray());
    }

    
}
