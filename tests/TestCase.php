<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected function aUser()
    {
        return \User::factory()->create();
    }

    protected function anAuthenticatedUser()
    {
        return tap($this->aUser(), function ($user) {
            $this->actingAs($user);
        });
    }
}
