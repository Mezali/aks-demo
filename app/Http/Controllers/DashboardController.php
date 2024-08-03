<?php

namespace App\Http\Controllers;

use App\Enums\ProfileTypeEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function orderbymonth(Request $request) {
        
        $year = explode('-', $request->ref)[0];

        $data = [];
        for ($i=1; $i <= 12; $i++) { 

            if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::SELLER(), ProfileTypeEnum::LEGAL_SELLER(), ProfileTypeEnum::SELLER_EMPLOYEE())) {
                
                $data[] = DB::query()
                ->select(DB::raw('count(*) as total'))
                ->from('order_locations')
                ->where('created_at', '>=', $year.'-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-01')
                ->where('created_at', '<=', $year.'-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-31')
                ->where('provider_id', '=', $request->owner->id)
                ->whereNull('deleted_at')
                ->get()[0]->total;
                
            } else if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::ADMIN())) {
                
                $data[] = DB::query()
                ->select(DB::raw('count(*) as total'))
                ->from('order_locations')
                ->where('created_at', '>=', $year.'-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-01')
                ->where('created_at', '<=', $year.'-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-31')
                ->whereNull('deleted_at')
                ->get()[0]->total;

            }

        }

        return response()->json(['data' => $data]);

    }

    public function cityrequest(Request $request) {


        $city = DB::query()
        ->select(DB::raw('count(*) total, cities.id, cities.name, states.acronym'))
        ->from('order_locations')
        ->join('addresses', 'order_locations.address_id', '=', 'addresses.id')
        ->join('cities', 'addresses.city_id', '=', 'cities.id')
        ->join('states', 'cities.state_id', '=', 'states.id')
        ->where('order_locations.created_at', '<=', $request->ref.'-31')
        ->whereNull('order_locations.deleted_at')
        ->groupBy('cities.id', 'cities.name', 'states.acronym')
        ->get();

        return response()->json(['data' => $city]);

    }

    public function productrequest(Request $request) {


        $city = DB::query()
        ->select(DB::raw('count(*) total, stationary_bucket_groups.id, stationary_bucket_groups.color, stationary_bucket_types.name'))
        ->from('order_location_products')
        ->join('order_locations', 'order_location_products.order_locations_id', '=', 'order_locations.id')
        ->join('stationary_buckets', 'order_location_products.productable_id', '=', 'stationary_buckets.id')
        ->join('stationary_bucket_groups', 'stationary_buckets.stationary_bucket_group_id', '=', 'stationary_bucket_groups.id')
        ->join('stationary_bucket_types', 'stationary_bucket_groups.stationary_bucket_type_id', '=', 'stationary_bucket_types.id')
        ->where('order_locations.created_at', '<=', $request->ref.'-31')
        ->where('stationary_buckets.user_id', '=', $request->owner->id)
        ->whereNull('order_locations.deleted_at')
        ->whereNull('order_location_products.deleted_at')
        ->groupBy('stationary_bucket_groups.id', 'stationary_bucket_groups.color', 'stationary_bucket_types.name')
        ->get();

        return response()->json(['data' => $city]);

    }

    public function productbymonth(Request $request) {

        $models = DB::query()->select(DB::raw('name, id'))->from('stationary_bucket_types')->get();
        
        $year = explode('-', $request->ref)[0];

        $data = [];
        foreach ($models as $model) {

            $temp = [];
            for ($i=1; $i <= 12; $i++) { 

                if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::CUSTOMER(), ProfileTypeEnum::LEGAL_CUSTOMER(), ProfileTypeEnum::CUSTOMER_EMPLOYEE())) {

                    $temp[] = DB::query()
                    ->select(DB::raw('count(*) as total'))
                    ->from('order_location_products')
                    ->join('order_locations', 'order_location_products.order_locations_id', '=', 'order_locations.id')
                    ->join('stationary_buckets', 'order_location_products.productable_id', '=', 'stationary_buckets.id')
                    ->join('stationary_bucket_groups', 'stationary_buckets.stationary_bucket_group_id', '=', 'stationary_bucket_groups.id')
                    ->where('order_locations.created_at', '>=', $year.'-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-01')
                    ->where('order_locations.created_at', '<=', $year.'-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-31')
                    ->where('stationary_bucket_groups.stationary_bucket_type_id', '=', $model->id)
                    ->where('order_locations.client_id', '=', $request->owner->id)
                    ->whereNull('order_locations.deleted_at')
                    ->whereNull('order_location_products.deleted_at')
                    ->get()[0]->total;

                } else if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::ADMIN(), ProfileTypeEnum::ADMIN_EMPLOYEE())) {

                    $temp[] = DB::query()
                    ->select(DB::raw('count(*) as total'))
                    ->from('stationary_buckets')
                    ->join('stationary_bucket_groups', 'stationary_buckets.stationary_bucket_group_id', '=', 'stationary_bucket_groups.id')
                    ->where('stationary_buckets.created_at', '>=', $year.'-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-01')
                    ->where('stationary_buckets.created_at', '<=', $year.'-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-31')
                    ->where('stationary_bucket_groups.stationary_bucket_type_id', '=', $model->id)
                    ->whereNull('stationary_buckets.deleted_at')
                    ->whereNull('stationary_bucket_groups.deleted_at')
                    ->get()[0]->total;

                }

                
            }

            $data[] = [
                "name" => 'Modelo '.$model->name,
                "type" => "bar",
                "stack" => "total",
                "data" => $temp
            ];
            
        }

        return response()->json(['data' => $data]);

    }

    public function deliverybymonth(Request $request) {

        $status = [ 
            ['label' => 'Entregas', 'value' => 'EP', 'field' => 'delivery_location_date', 'driver' => 'driver_id'],
            ['label' => 'Retiradas', 'value' => 'AR', 'field' => 'delivery_withdrawl_date', 'driver' => 'withdraw_driver_id']
        ];
        
        $year = explode('-', $request->ref)[0];

        $data = [];
        foreach ($status as $model) {

            $temp = [];
            for ($i=1; $i <= 12; $i++) { 

                if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::SELLER(), ProfileTypeEnum::SELLER_DRIVER())) {

                    $temp[] = DB::query()
                    ->select(DB::raw('count(*) as total'))
                    ->from('order_location_products')
                    ->join('order_locations', 'order_location_products.order_locations_id', '=', 'order_locations.id')
                    ->join('stationary_buckets', 'order_location_products.productable_id', '=', 'stationary_buckets.id')
                    ->join('stationary_bucket_groups', 'stationary_buckets.stationary_bucket_group_id', '=', 'stationary_bucket_groups.id')
                    ->where('order_location_products.'.$model['field'], '>=', $year.'-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-01')
                    ->where('order_location_products.'.$model['field'], '<=', $year.'-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-31')
                    ->where('order_location_products.'.$model['driver'], '=', $request->user()->id)
                    ->whereNull('order_locations.deleted_at')
                    ->whereNull('order_location_products.deleted_at')
                    ->get()[0]->total;

                }
                
            }

            $data[] = [
                "name" => $model['label'],
                "type" => "bar",
                "data" => $temp
            ];
            
        }

        return response()->json(['data' => $data]);

    }

    public function productbytype(Request $request) {

        $models = DB::query()->select(DB::raw('name, id'))->from('stationary_bucket_types')->get();

        foreach ($models as $key => $model) {

            if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::SELLER(), ProfileTypeEnum::LEGAL_SELLER(), ProfileTypeEnum::SELLER_EMPLOYEE())) {
              
                if ($request->status) {
                    $status = explode(',', $request->status);
                    $models[$key]->total = DB::query()
                    ->select(DB::raw('count(*) as total'))
                    ->from('stationary_buckets')
                    ->join('stationary_bucket_groups', 'stationary_buckets.stationary_bucket_group_id', '=', 'stationary_bucket_groups.id')
                    ->where('stationary_buckets.created_at', '<=', $request->ref.'-31')
                    ->where('stationary_bucket_groups.stationary_bucket_type_id', '=', $model->id)
                    ->where('stationary_buckets.user_id', '=', $request->owner->id)
                    ->whereIn('stationary_buckets.status', $status)
                    ->whereNull('stationary_buckets.deleted_at')
                    ->whereNull('stationary_bucket_groups.deleted_at')
                    ->get()[0]->total;
                } else {
                    $models[$key]->total = DB::query()
                    ->select(DB::raw('count(*) as total'))
                    ->from('stationary_buckets')
                    ->join('stationary_bucket_groups', 'stationary_buckets.stationary_bucket_group_id', '=', 'stationary_bucket_groups.id')
                    ->where('stationary_buckets.created_at', '<=', $request->ref.'-31')
                    ->where('stationary_bucket_groups.stationary_bucket_type_id', '=', $model->id)
                    ->where('stationary_buckets.user_id', '=', $request->owner->id)
                    ->whereNull('stationary_buckets.deleted_at')
                    ->whereNull('stationary_bucket_groups.deleted_at')
                    ->get()[0]->total;
                }

            } else if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::ADMIN())) {

                $models[$key]->total = DB::query()
                ->select(DB::raw('count(*) as total'))
                ->from('stationary_buckets')
                ->join('stationary_bucket_groups', 'stationary_buckets.stationary_bucket_group_id', '=', 'stationary_bucket_groups.id')
                ->where('stationary_buckets.created_at', '<=', $request->ref.'-31')
                ->where('stationary_bucket_groups.stationary_bucket_type_id', '=', $model->id)
                ->whereNull('stationary_buckets.deleted_at')
                ->whereNull('stationary_bucket_groups.deleted_at')
                ->get()[0]->total;

            } else if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::CUSTOMER(), ProfileTypeEnum::LEGAL_CUSTOMER(), ProfileTypeEnum::CUSTOMER_EMPLOYEE())) {

                if ($request->status) {
                    $status = explode(',', $request->status);
                    $models[$key]->total = DB::query()
                    ->select(DB::raw('count(*) as total'))
                    ->from('order_location_products')
                    ->join('order_locations', 'order_location_products.order_locations_id', '=', 'order_locations.id')
                    ->join('stationary_buckets', 'order_location_products.productable_id', '=', 'stationary_buckets.id')
                    ->join('stationary_bucket_groups', 'stationary_buckets.stationary_bucket_group_id', '=', 'stationary_bucket_groups.id')
                    ->where('stationary_buckets.created_at', '<=', $request->ref.'-31')
                    ->where('stationary_bucket_groups.stationary_bucket_type_id', '=', $model->id)
                    ->where('order_locations.client_id', '=', $request->owner->id)
                    ->whereIn('stationary_buckets.status', $status)
                    ->whereNull('order_locations.deleted_at')
                    ->whereNull('order_location_products.deleted_at')
                    ->get()[0]->total;
                } else {
                    $models[$key]->total = DB::query()
                    ->select(DB::raw('count(*) as total'))
                    ->from('order_location_products')
                    ->join('order_locations', 'order_location_products.order_locations_id', '=', 'order_locations.id')
                    ->join('stationary_buckets', 'order_location_products.productable_id', '=', 'stationary_buckets.id')
                    ->join('stationary_bucket_groups', 'stationary_buckets.stationary_bucket_group_id', '=', 'stationary_bucket_groups.id')
                    ->where('stationary_buckets.created_at', '<=', $request->ref.'-31')
                    ->where('stationary_bucket_groups.stationary_bucket_type_id', '=', $model->id)
                    ->where('order_locations.client_id', '=', $request->owner->id)
                    ->whereNull('order_locations.deleted_at')
                    ->whereNull('order_location_products.deleted_at')
                    ->get()[0]->total;
                }

            }
            
        }

        return response()->json(['data' => $models]);

    }

    public function usersbymonth(Request $request) {

        $year = explode('-', $request->ref)[0];

        $data = [
            ["name" => 'Locadores', "type" => "bar", "stack" => "total", "data" => []],
            ["name" => 'Locatários', "type" => "bar", "stack" => "total", "data" => []],
        ];

        foreach ($data as $key => $value) {

            $types = ($value['name'] === 'Locadores') ? [ProfileTypeEnum::SELLER(), ProfileTypeEnum::LEGAL_SELLER()] : [ProfileTypeEnum::CUSTOMER(), ProfileTypeEnum::LEGAL_CUSTOMER()];

            for ($i=1; $i <= 12; $i++) { 

                $user = DB::query()
                ->select(DB::raw('count(*) as total'))
                ->from('users')
                ->join('profiles', 'profiles.user_id', '=', 'users.id')
                ->where('users.created_at', '>=', $year.'-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-01')
                ->where('users.created_at', '<=', $year.'-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-31')
                ->whereIn('profiles.type', $types)
                ->whereNull('profiles.deleted_at')
                ->whereNull('users.deleted_at')
                ->get();

                $data[$key]['data'][] = $user[0]->total;
                
            }

        }

        return response()->json(['data' => $data]);

    }

}
