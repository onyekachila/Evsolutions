<?php

namespace Tests\Feature\Event;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Modules\Event\Event;
use App\User;

class EventTest extends TestCase
{
    use DatabaseMigrations;

    private $user;

    protected function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /**  @test  */
    public function a_guest_should_not_see_events_test()
    {
        $this->get(route('events'))
            ->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_see_list_of_events_test()
    {
        $event = factory(Event::class)->create();
        
        $this->actingAs($this->user)
        ->get(route('events'))
        ->assertStatus(200)
        ->assertSee($event->title)
        ->assertSee($event->description);
    }

    /** @test */
    public function a_user_can_view_event_details_test()
    {
        $event = factory(Event::class)->create();

        dd($event->creator->name);

        $this->actingAs($this->user)
            ->get(route('event-view', $event->id))
            ->assertSee($event->title)
            ->assertSee($event->creator->name);
    }
}
