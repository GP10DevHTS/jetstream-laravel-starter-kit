<?php

namespace Tests\Feature;

use App\Models\Patient;
use App\Models\TestService;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class SubmitTestRequestTest extends TestCase
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
    public function test_that_render_submit_test_request_returns_a_successfull_response(): void
    {
        $this->withoutExceptionHandling();

        $patients = Patient::all();
        $test_services = TestService::all();

        $response = $this->actingAs($this->user)->get(route('requests.create'));
        $views = $this->view('pages.submit-test-requests.create', [
            'patients' => $patients,
            'test_services' => $test_services,
        ]);

        $response->assertOk();
        $views->assertSeeText('Submit Test Request');
    }

    /** @test */
    public function a_user_can_submit_a_test_request(): void
    {
        $patient = Patient::factory()->create();
        $test_service = TestService::factory()->create();

        $response = $this->actingAs($this->user)->post(route('requests.store'), [
            'patient_id' => $patient->id,
            'test_service_id' => $test_service->id,
            'spacemen_id' => '',
            'result_id' => '',
        ]);

        $this->assertDatabaseCount('test_requsts', 1);
        $response->assertRedirect(route('requests.index'));
    }
}
