<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class SampleResultTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    public function setUP(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $admin = Role::create(['name' => 'Admin']);
        $this->user->assignRole($admin);
    }

    /** @test */
    public function test_that_sample_result_returns_a_success_response(): void
    {

        $response = $this->actingAs($this->user)->get(route('sample-results.index'));
        $view = $this->view('pages.sample-results.index');

        $response->assertOk();
        $view->assertSeeText('Results from the sample taken');
    }
}
