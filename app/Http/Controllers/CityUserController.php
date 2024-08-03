<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    CityUser,
    User
};

class CityUserController extends Controller
{
    public function show(Request $request, int $id)
    {


        $cities =  (User::find($request->owner->id))->citiesCoverage()->with('state')->get();

        $result = [];

        // Percorre cada cidade nos dados fornecidos
        foreach ($cities as $item) {
            $stateName = $item['state']['name'];

            // Se o estado ainda não existir no resultado, adicione-o
            if (!isset($data[$stateName])) {
                $data[$stateName] = [
                    "key" => $stateName,
                    "label" => $stateName,
                    "children" => "<ul>"
                ];
            }

            // Adiciona a cidade à lista do estado correspondente
            $data[$stateName]['children'] .= "<li>{$item['name']}</li>";
        }

        // Finaliza cada lista de cidades
        foreach ($data as &$state) {
            $state['children'] .= "</ul>";
        }

        // Remove as chaves de estado para converter em array indexado
        $data = array_values($data);

        $select = [];

        foreach ($cities as $item) {
            $stateName = $item['state']['name'];
            $cityId = $item['id'];
    
            // Se o estado ainda não existir no resultado, adicione-o
            if (!isset($select[$stateName])) {
                $select[$stateName] = [];
            }
    
            // Adiciona o ID da cidade à lista do estado correspondente
            $select[$stateName][] = (string)$cityId; // Convertendo o ID para string
        }

        return response()->json([
            'data' => $data,
            'select' => $select
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required',
        ]);

        $request->data = json_decode($request->data, true);

        $numbers = array_reduce($request->data, function ($carry, $item) {
            return array_merge($carry, $item);
        }, []);

        $request->owner->citiesCoverage()->sync($numbers);

        // $cityUser = CityUser::create($request->all());
        // return new CityUserResource($cityUser);
    }

    public function destroy(CityUser $cityUser)
    {
        return new CityUserResource($cityUser);
    }
}
