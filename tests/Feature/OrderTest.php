<?php

use App\Models\User;

use function Pest\Laravel\assertDatabaseHas;

test('Adicionar produto ao carrinho', function () {
    $this->actingAs($user = User::find(2));

    $response = $this->withHeaders(['Profile' => '2'])
        ->postJson('/api/cart_product', [
            'product_id' => 1,
            'quantity' => 1,
            'days' => 1,
            'price' => 100.00,
            'address_id' => 1,
            'type_local' => 'E',
        ]);
    
    $response->assertStatus(201);

    // assertDatabaseHas('cart_products', [
    //     'user_id' => $user->id,
    //     'product_id' => 1,
    //     'quantity' => 1,
    //     'days' => 1,
    //     'price' => 100.00,
    //     'profile' => 2,
    //     'address_id' => 1,
    //     'type_local' => 'E',
    // ]);
});
