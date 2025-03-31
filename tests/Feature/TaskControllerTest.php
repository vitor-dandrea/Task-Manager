<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    // Helper to create test tasks
    private function createTask($status = 'pendente')
    {
        return Task::factory()->create([
            'title' => 'Test Task',
            'status' => $status
        ]);
    }

    /** @test */
    public function lista_todas_as_tarefas()
    {
        $this->createTask();
        $this->createTask('em andamento');

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200)
            ->assertJsonCount(2, 'data');
    }

    /** @test */
    public function cria_tarefa_com_dados_validos()
    {
        $response = $this->postJson('/api/tasks', [
            'title' => 'Nova Tarefa',
            'status' => 'pendente'
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['title' => 'Nova Tarefa']);
    }

    /** @test */
    public function nao_cria_tarefa_sem_titulo()
    {
        $response = $this->postJson('/api/tasks', [
            'status' => 'pendente'
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['title']);
    }

    /** @test */
    public function atualiza_tarefa_pendente()
    {
        $task = $this->createTask();

        $response = $this->putJson("/api/tasks/{$task->id}", [
            'status' => 'em andamento'
        ]);

        $response->assertStatus(200);
        $this->assertEquals('em andamento', $task->fresh()->status);
    }

    /** @test */
    public function nao_atualiza_tarefa_concluida()
    {
        $task = $this->createTask('concluído');

        $response = $this->putJson("/api/tasks/{$task->id}", [
            'title' => 'Título Atualizado'
        ]);

        $response->assertStatus(403);
    }

    /** @test */
    public function deleta_tarefa_pendente()
    {
        $task = $this->createTask();

        $response = $this->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    /** @test */
    public function nao_deleta_tarefa_em_andamento()
    {
        $task = $this->createTask('em andamento');

        $response = $this->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(403);
    }
}