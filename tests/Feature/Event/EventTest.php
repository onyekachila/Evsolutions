<?php

namespace Tests\Feature\Event;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Modules\Event\Event; 

class EventTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_see_list_of_events()
    {
        $event = factory(Event::class)->create();
        
        $this->get(route('events'))
        ->assertStatus(200)
        ->assertSee($event->title)
        ->assertSee($event->description); 
           
    }
}
