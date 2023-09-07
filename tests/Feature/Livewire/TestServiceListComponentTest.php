<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\TestServiceListComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TestServiceListComponentTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(TestServiceListComponent::class);

        $component->assertStatus(200);
    }
}
