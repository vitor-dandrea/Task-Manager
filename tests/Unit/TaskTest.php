<?php

namespace Tests\Unit;

use App\Models\Task;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /** @test */
    public function test_verifica_se_tarefa_esta_pendente()
    {
        $tarefaPendente = Task::factory()->create(['status' => 'pendente']);
        $this->assertTrue($tarefaPendente->estaPendente());

        $tarefaEmAndamento = Task::factory()->create(['status' => 'em andamento']);
        $this->assertFalse($tarefaEmAndamento->estaPendente());

        $tarefaConcluida = Task::factory()->create(['status' => 'concluído']);
        $this->assertFalse($tarefaConcluida->estaPendente());
    }

    /** @test */
    public function test_verifica_se_tarefa_permite_edicao()
    {
        $tarefaPendente = Task::factory()->create(['status' => 'pendente']);
        $this->assertTrue($tarefaPendente->permiteEdicao());

        $tarefaEmAndamento = Task::factory()->create(['status' => 'em andamento']);
        $this->assertFalse($tarefaEmAndamento->permiteEdicao());

        $tarefaConcluida = Task::factory()->create(['status' => 'concluído']);
        $this->assertFalse($tarefaConcluida->permiteEdicao());
    }

    /** @test */
    public function test_verifica_se_tarefa_permite_exclusao()
    {
        $tarefaPendente = Task::factory()->create(['status' => 'pendente']);
        $this->assertTrue($tarefaPendente->permiteExclusao());

        $tarefaEmAndamento = Task::factory()->create(['status' => 'em andamento']);
        $this->assertFalse($tarefaEmAndamento->permiteExclusao());

        $tarefaConcluida = Task::factory()->create(['status' => 'concluído']);
        $this->assertFalse($tarefaConcluida->permiteExclusao());
    }
}