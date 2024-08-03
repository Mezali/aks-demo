<?php

namespace App\Console\Commands;

use App\Data\DefaultPermissions;
use App\Listeners\Transaction\Order;
use App\Service\Asaas\Facades\Asaas;
use App\Service\Asaas\Requests\ChargeRequest;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use App\Enums\{
    Order\OrderStatusEnum,
    ProfileTypeEnum
};
use App\Models\{
    Address,
    City,
    CityUser,
    Notification,
    Order as ModelsOrder,
    StationaryBucket,
    StationaryBucketGroup,
    Transaction,
    User
};

class play extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'play';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Notification::create([
            'user_from_id'  => 1,
            'user_to_id'    => 2,
            'message'       => "Novo pedido realizado! Aguardando confirmação.",
            'url'           => "/painel/pedidoscacamba/1/detalhes",
            'color'         => "#6015CF"
        ]);
    }
}
