<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AdminSignUpTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_signup_page_can_render_with_a_success_response(): void
    {
        $reponse = $this->get(route('admin-signup.create'));

        $reponse->assertStatus(200);
    }

    /** @test */
    public function create_an_admin_account_successfully(): void
    {
        $this->markTestSkipped();
        $response = $this->post(route('admin-singup.store'), [
            'name' => 'Allan Muntu',
            'email' => 'muntuallan@gmail.com',
            'password' => Hash::make('321wordpass'), //password123
        ]);

        $this->assertDatabaseCount('users', 1);
        $response->assertRedirect(route('login'));
        $response->assertStatus(302);
    }
}
