<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;


    public function setUp()
    {
        parent::setUp();
        $this->thread = factory('App\Thread')->create();
    }

    /** @test */
    public function a_thread_can_add_replies()
    {
        $this->thread->addReply([
            'body'=>'FooBar',
            'user_id' =>1
        ]);
        $this->assertCount(1,$this->thread->replies );
    }

    /** @test */
    public function a_thread_has_replies()
    {
        $replay = create('App\Reply',['thread_id'=>$this->thread->id]);

        // has many => 'Illuminate\Database\Eloquent\Collection'
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$this->thread->replies); //Is Correct
        $this->assertTrue($this->thread->replies->contains($replay)); // Is The Best

    }

   /** @test */
    public function a_thread_has_creator()
    {
        $this->assertInstanceOf('App\User',$this->thread->creator);
    }

    /** @test */
    public function a_thread_belongs_to_a_channel()
    {
        $this->assertInstanceOf('App\Channel',$this->thread->channel);
    }

}
