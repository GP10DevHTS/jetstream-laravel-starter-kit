<?php

namespace Tests\Feature;

use App\Models\Result;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ResultsTest extends TestCase
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
    public function test_that_results_returns_a_successfull_response(): void
    {
        $response = $this->actingAs($this->user)->get(route('results.index'));
        $view = $this->view('pages.results.index');

        $response->assertOk();
        $view->assertSeeText('Results');
    }

    /** @test */
    public function test_that_a_user_can_add_a_results_record(): void
    {

        $response = $this->actingAs($this->user)->post(route('results.store'), [
            'result' => 'Negative',
            'code' => 'NEGATIVE',
            'symbol' => '-',
            'user_id' => $this->user->id
        ]);

        $this->assertDatabaseCount('results', 1);
        $response->assertRedirect(route('results.create'));
    }

    /** @test */
    public function result_is_required(): void
    {
        $response = $this->actingAs($this->user)->post(route('results.store'), [
            'result' => '',
            'code' => 'NEGATIVE',
            'symbol' => '-',
            'user_id' => $this->user->id
        ]);

        $response->assertSessionHasErrors('result');
    }

    /** @test */
    public function code_is_required(): void
    {
        $response = $this->actingAs($this->user)->post(route('results.store'), [
            'result' => 'Negative',
            'code' => '',
            'symbol' => '-',
            'user_id' => $this->user->id
        ]);

        $response->assertSessionHasErrors('code');
    }
    /** @test */
    public function symbol_is_required(): void
    {
        $response = $this->actingAs($this->user)->post(route('results.store'), [
            'result' => 'Negative',
            'code' => 'NEGATIVE',
            'symbol' => '',
            'user_id' => $this->user->id
        ]);

        $response->assertSessionHasErrors('symbol');
    }

    /** @test */
    public function result_info_can_be_updated(): void
    {


        $this->actingAs($this->user)->post(route('results.store'), [
            'result' => 'Negative',
            'code' => 'NEGATIVE',
            'symbol' => '-',
            'user_id' => $this->user->id
        ]);

        $result = Result::first();
        $response = $this->actingAs($this->user)->put(route('results.update', $result->id), [
            'result' => 'Positive',
            'code' => 'POSITIVE',
            'symbol' => '+',
            'user_id' => $this->user->id
        ]);

        $this->assertEquals('Positive', Result::first()->result);
        $this->assertEquals('POSITIVE', Result::first()->code);
        $this->assertEquals('+', Result::first()->symbol);
        $response->assertRedirect(route('results.show', $result->id));
    }

    /** @test */
    public function result_can_be_deleted(): void
    {

        $this->actingAs($this->user)->post(route('results.store'), [
            'result' => 'Positive',
            'code' => 'POSITIVE',
            'symbol' => '+',
            'user_id' => $this->user->id
        ]);
        $result = Result::first();
        $response = $this->delete(route('results.destroy', $result->id));

        $this->assertDatabaseCount('results', 0);
        $response->assertRedirect(route('results.index'));
    }
}
