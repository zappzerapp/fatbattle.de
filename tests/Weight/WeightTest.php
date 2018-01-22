<?php

namespace Tests\Weight;

use App\Events\WeightUpdated;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class WeightTest extends TestCase
{
    /** @test */
    public function it_can_store_weights_with_decimalcomma()
    {
        // No (middleware) token missmatch please
        $user = $this->withoutMiddleware()->anAuthenticatedUser();

        $this->post(route('weight.store'), ['weight' => '90,5']);

        $this->assertEquals(90.5, $user->latestWeightValues->last());
    }

    /** @test */
    public function it_can_store_weights_with_decimalpoint()
    {
        // No (middleware) token missmatch please
        $user = $this->withoutMiddleware()->anAuthenticatedUser();

        $this->post(route('weight.store'), ['weight' => '90.5']);

        $this->assertEquals(90.5, $user->latestWeightValues->last());
    }

    /** @test */
    public function after_weighting_an_info_is_broadcasted()
    {
        Event::fake();

        // No (middleware) token missmatch please
        $user = $this->withoutMiddleware()->anAuthenticatedUser();

        $this->post(route('weight.store'), ['weight' => '90.5']);

        Event::assertDispatchedTimes(WeightUpdated::class, 1);
    }
}
