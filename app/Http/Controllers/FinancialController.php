<?php

namespace App\Http\Controllers;

use App\Enums\ProfileTypeEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinancialController extends Controller
{
    

    public function month(Request $request) {
        
        if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::SELLER(), ProfileTypeEnum::LEGAL_CUSTOMER(), ProfileTypeEnum::CUSTOMER_EMPLOYEE())) {
            $order = DB::query()
            ->select(DB::raw('sum(price*quantity) as total'))
            ->from('order_locations')
            ->where('created_at', '>=', $request->ref.'-01')
            ->where('created_at', '<=', $request->ref.'-31')
            ->where('provider_id', '=', $request->owner->id)
            ->whereNull('deleted_at')
            ->get();
        } else if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::ADMIN(), ProfileTypeEnum::ADMIN_EMPLOYEE())) {
            $order = DB::query()
            ->select(DB::raw('sum(price*quantity) as total'))
            ->from('order_locations')
            ->where('created_at', '>=', $request->ref.'-01')
            ->where('created_at', '<=', $request->ref.'-31')
            ->whereNull('deleted_at')
            ->get();
        }

        $value = $order[0]->total ? $order[0]->total : 0;
        $value = 'R$ '.number_format($value, 2, ',', '.');

        return response()->json(['data' => $value]);

    }

    public function year(Request $request) {
        
        $year = explode('-', $request->ref)[0];

        if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::SELLER(), ProfileTypeEnum::LEGAL_CUSTOMER(), ProfileTypeEnum::CUSTOMER_EMPLOYEE())) {
            $order = DB::query()
            ->select(DB::raw('sum(price*quantity) as total'))
            ->from('order_locations')
            ->where('created_at', '>=', $year.'-01-01')
            ->where('created_at', '<=', $year.'-12-31')
            ->where('provider_id', '=', $request->owner->id)
            ->whereNull('deleted_at')
            ->get();
        } else if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::ADMIN(), ProfileTypeEnum::ADMIN_EMPLOYEE())) {
            $order = DB::query()
            ->select(DB::raw('sum(price*quantity) as total'))
            ->from('order_locations')
            ->where('created_at', '>=', $year.'-01-01')
            ->where('created_at', '<=', $year.'-12-31')
            ->whereNull('deleted_at')
            ->get();
        }

        $value = $order[0]->total ? $order[0]->total : 0;
        $value = 'R$ '.number_format($value, 2, ',', '.');

        return response()->json(['data' => $value]);

    }

    public function goal(Request $request) {
        
        $year = explode('-', $request->ref)[0];

        if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::SELLER(), ProfileTypeEnum::LEGAL_CUSTOMER(), ProfileTypeEnum::CUSTOMER_EMPLOYEE())) {
            $order = DB::query()
            ->select(DB::raw('sum(price*quantity) as total'))
            ->from('order_locations')
            ->where('created_at', '>=', $year.'-01-01')
            ->where('created_at', '<=', $year.'-12-31')
            ->where('provider_id', '=', $request->owner->id)
            ->whereNull('deleted_at')
            ->get();
        } else if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::ADMIN(), ProfileTypeEnum::ADMIN_EMPLOYEE())) {
            $order = DB::query()
            ->select(DB::raw('sum(price*quantity) as total'))
            ->from('order_locations')
            ->where('created_at', '>=', $year.'-01-01')
            ->where('created_at', '<=', $year.'-12-31')
            ->whereNull('deleted_at')
            ->get();
        }

        $order = count($order) > 0 ? $order[0]->total : 0;

        $goal = DB::query()
        ->select(DB::raw('goal'))
        ->from('goals')
        ->where('year', '=', $year)
        ->where('user_id', '=', $request->owner->id)
        ->whereNull('deleted_at')
        ->get();

        $goal = count($goal) > 0 ? $goal[0]->goal : 0;

        $value = $goal > 0 ? number_format(($order / $goal)*100, 2, '.', '') : 100;

        return response()->json(['data' => $value, 'goal' => $goal]);

    }

    public function orderbymonth(Request $request) {
        
        $year = explode('-', $request->ref)[0];

        $data = [];
        for ($i=1; $i <= 12; $i++) { 

            if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::SELLER(), ProfileTypeEnum::LEGAL_CUSTOMER(), ProfileTypeEnum::CUSTOMER_EMPLOYEE())) {
                $order = DB::query()
                ->select(DB::raw('sum(price*quantity) as total'))
                ->from('order_locations')
                ->where('created_at', '>=', $year.'-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-01')
                ->where('created_at', '<=', $year.'-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-31')
                ->where('provider_id', '=', $request->owner->id)
                ->get();
            } else if (ProfileTypeEnum::from($request->currentProfile->type)->equals(ProfileTypeEnum::ADMIN(), ProfileTypeEnum::ADMIN_EMPLOYEE())) {
                $order = DB::query()
                ->select(DB::raw('sum(price*quantity) as total'))
                ->from('order_locations')
                ->where('created_at', '>=', $year.'-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-01')
                ->where('created_at', '<=', $year.'-'.str_pad($i, 2, '0', STR_PAD_LEFT).'-31')
                ->get();
            }

            $data[] = floatval($order[0]->total);
        }

        return response()->json(['data' => $data] );

    }

}
