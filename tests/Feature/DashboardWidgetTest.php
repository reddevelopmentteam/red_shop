<?php

use App\Models\User;

test('dashboard shows the custom widget content', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/admin/dashboard');

    $response->assertOk();
    $response->assertSee('Halo,');
    $response->assertSee('SEKILAS PORTOFOLIO');
});
