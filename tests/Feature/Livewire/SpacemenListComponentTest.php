<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\SpacemenListComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SpacemenListComponentTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(SpacemenListComponent::class);

        $component->assertStatus(200);
    }
}
