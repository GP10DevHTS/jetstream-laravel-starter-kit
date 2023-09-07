<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\PatientsListComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PatientsListComponentTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(PatientsListComponent::class);

        $component->assertStatus(200);
    }
}
