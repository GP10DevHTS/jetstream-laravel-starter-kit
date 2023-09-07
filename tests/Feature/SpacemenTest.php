<?php

namespace Tests\Feature;

use App\Models\Spacemen;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class SpacemenTest extends TestCase
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
    public function test_spacemen_page_can_be_rendered_with_success(): void
    {
        $response = $this->actingAs($this->user)->get(route('spacemens.index'));
        $view = $this->view('pages.spacemens.index');

        $response->assertOk();
        $view->assertSeeText('Spacemens');
    }

    /** @test */
    public function a_spacemen_can_be_added(): void
    {
        $response = $this->actingAs($this->user)->post(route('spacemens.store'), [
            'spacemen' => 'blood',
            'user_id' => $this->user->id,
        ]);

        $this->assertDatabaseCount('spacemens', 1);
        $response->assertRedirect(route('spacemens.index'));
    }

    /** @test */
    public function spacemen_is_required(): void
    {
        $response = $this->actingAs($this->user)->post(route('spacemens.store'), [
            'spacemen' => '',
            'user_id' => $this->user->id,
        ]);

        $response->assertSessionHasErrors('spacemen');
    }

    /** @test */
    public function spacemen_can_be_updated(): void
    {
        $data = $this->actingAs($this->user)->post(route('spacemens.store'), [
            'spacemen' => 'blood',
            'user_id' => $this->user->id,
        ]);

        $spacemen = Spacemen::first();

        $response = $this->actingAs($this->user)->put(route('spacemens.update', $spacemen->id), [
            'spacemen' => 'urine',
            'user_id' => $this->user->id,
        ]);

        $this->assertEquals('urine', Spacemen::first()->spacemen);
        $response->assertRedirect(route('spacemens.show', $spacemen->id));
    }

    /** @test */
    public function test_spacemen_can_be_deleted(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $this->actingAs($this->user)->post(route('spacemens.store'), [
            'spacemen' => 'blood',
            'user_id' => $this->user->id,
        ]);
        $spacemen = Spacemen::first();
        $response = $this->delete(route('spacemens.destroy', $spacemen->id));

        $this->assertDatabaseCount('spacemens', 0);
        $response->assertRedirect(route('spacemens.index'));
    }
}
