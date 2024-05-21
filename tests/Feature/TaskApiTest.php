<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_task()
    {
        $data = [
            'title' => 'Test Task',
            'description' => 'This is a test task description',
        ];

        $response = $this->postJson('/api/tasks', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'title' => 'Test Task',
                     'description' => 'This is a test task description',
                ]);

        $this->assertDatabaseHas('tasks', $data);
    }

    /** @test */
    public function it_fetches_all_tasks()
    {
        Task::factory()->count(3)->create();

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function it_fetches_a_single_task()
    {
        $task = Task::factory()->create();

        $response = $this->getJson("/api/tasks/{$task->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'title' => $task->title,
                     'description' => $task->description,
                ]);
    }

    /** @test */
    public function it_updates_a_task()
    {
        $task = Task::factory()->create();

        $data = [
            'title' => 'Updated Task Title',
            'description' => 'Updated Task Description',
            'is_completed' => true,
        ];

        $response = $this->putJson("/api/tasks/{$task->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'title' => 'Updated Task Title',
                     'description' => 'Updated Task Description',
                     'is_completed' => true,
                ]);

        $this->assertDatabaseHas('tasks', $data);
    }

    /** @test */
    public function it_deletes_a_task()
    {
        $task = Task::factory()->create();

        $response = $this->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Task deleted successfully']);

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
