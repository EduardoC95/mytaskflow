<?php

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can list tasks', function () {
    Task::factory()->count(3)->create();

    $response = $this->get(route('tasks.index'));

    $response->assertOk();
    $response->assertViewIs('tasks.index');
    $response->assertViewHas('tasks');
});

it('can create a task', function () {
    $response = $this->post(route('tasks.store'), [
        'title' => 'Preparar apresentação',
        'description' => 'Demo MyTaskFlow',
        'due_date' => now()->addDays(3)->format('Y-m-d'),
        'priority' => 'high',
    ]);

    $response->assertRedirect(route('tasks.index'));

    $this->assertDatabaseHas('tasks', [
        'title' => 'Preparar apresentação',
        'priority' => 'high',
        'status' => 'pending',
    ]);
});

it('validates title when creating a task', function () {
    $response = $this->post(route('tasks.store'), [
        'title' => '',
        'priority' => 'medium',
    ]);

    $response->assertSessionHasErrors('title');
});

it('can update a task', function () {
    $task = Task::factory()->create([
        'title' => 'Antigo',
        'priority' => 'low',
    ]);

    $response = $this->put(route('tasks.update', $task), [
        'title' => 'Atualizado',
        'description' => 'Nova descrição',
        'due_date' => now()->addDays(5)->format('Y-m-d'),
        'priority' => 'medium',
    ]);

    $response->assertRedirect(route('tasks.index'));

    $this->assertDatabaseHas('tasks', [
        'id' => $task->id,
        'title' => 'Atualizado',
        'priority' => 'medium',
    ]);
});

it('can mark a task as completed', function () {
    $task = Task::factory()->create([
        'status' => 'pending',
        'completed_at' => null,
    ]);

    $response = $this->patch(route('tasks.toggle', $task));

    $response->assertRedirect(route('tasks.index'));

    $this->assertDatabaseHas('tasks', [
        'id' => $task->id,
        'status' => 'completed',
    ]);
});

it('can delete a task', function () {
    $task = Task::factory()->create();

    $response = $this->delete(route('tasks.destroy', $task));

    $response->assertRedirect(route('tasks.index'));

    $this->assertDatabaseMissing('tasks', [
        'id' => $task->id,
    ]);
});
