<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\MostrarInstitucion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class MostrarInstitucionTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(MostrarInstitucion::class);

        $component->assertStatus(200);
    }
}
