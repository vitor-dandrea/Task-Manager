# Task Manager

Sistema backend de gerenciamento de tarefas desenvolvido em Laravel com operações CRUD (criar, ler, atualizar e deletar), contendo regras de negócio para controle de status das tarefas.

### Requisitos:

PHP 8.1 ou superior (com extensões pdo_mysql, xml, mbstring)  
Composer  
Laravel 10  
MySQL versão 8+  
Git  
#### Opcionais Recomendados:
cURL  
Jq (processador JSON de terminal)  


## Instalação e Configuração

### 1. Clonar o repositório

    git clone https://github.com/vitor-dandrea/task-manager.git
    cd task-manager

### 2. Instalar dependêcia

    composer install

### 3. Configurar Ambiente

Configurar as crendenciais do arquivo .env para que correspondam ao seu servidor MySQL.  
Exemplo hipotético (para preservar as credenciais que não devem ser compartilhadas publicamente):

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=task_manager
    DB_USERNAME=usuario_com_permissao // Usuário deve ter permissões de acesso
    DB_PASSWORD=senha_do_usuario

    

### 4. Gerar chave da aplicação

    php artisan key:generate

### 5. Criar Banco de Dados no MySQL
    
    CREATE DATABASE task_manager;

## Executando o Projeto

### 1. Iniciar servidor local
    
    php artisan serve

### 2. Criar Migrações e Seeds

    php artisan migrate:fresh --seed

### 3. Listar Tasks

acesse: http://localhost:8000/api/tasks

ou (para uma rápida e melhor visualização dos registros via terminal)

    curl -s http://localhost:8000/api/tasks | jq .

### 4. Criar Tasks

    curl -X POST http://localhost:8000/api/tasks \
      -H "Content-Type: application/json" \
      -H "Accept: application/json" \
      -d '{
    "title": "Minha nova tarefa",
    "description": "Descrição detalhada aqui",
    "status": "pendente",
    "due_date": "2023-12-31"
      }'

## Considerações

- PHP 8.1 foi escolhido por sua compatibilidade com o Laravel 10.
    
- Ambos PHP 8.1 e Laravel 10 foram escolhidos por seu LTS (suporte a longo prazo) e vasta quantia de documentação oficial e não-oficial (livros, plataformas, etc.)

- Alguns testes unitários foram feitos e executados, através do PHPUnit, para o Model e o Controller da aplicação. 

## Guia de Estrutura Geral do Projeto (somente os arquivos mais relevantes)
### Observação: arquivos padrões do Laravel foram mantidos na aplicação, mas omitidos desta estrutura.

.  
├── ./app  
│   ├── ./app/Http  
│   │   ├── ./app/Http/Controllers  
│   │   │   ├── ./app/Http/Controllers/Api  
│   │   │   │   └── ./app/Http/Controllers/Api/TaskController.php  
│   │   ├── ./app/Http/Resources  
│   │   │   └── ./app/Http/Resources/TaskResource.php  
│   ├── ./app/Models  
│   │   ├── ./app/Models/Task.php  
├── ./database  
│   ├── ./database/factories  
│   │   ├── ./database/factories/TaskFactory.php  
│   ├── ./database/migrations  
│   │   └── ./database/migrations/2025_03_28_192433_create_tasks_table.php  
│   └── ./database/seeders  
│       └── ./database/seeders/TaskSeeder.php  
├── ./routes  
│   ├── ./routes/api.php  
├── ./tests  
│   ├── ./tests/Feature  
│   │   └── ./tests/Feature/TaskControllerTest.php  
│   ├── ./tests/Unit  
│   │   └── ./tests/Unit/TaskTest.php  
│   └── ./tests/TestCase.php  
├── ./artisan  
├── ./composer.json  
├── ./composer.lock  
├── ./elect('SHOW TABLES');  
├── ./estrutura_projeto.txt  
├── ./package.json  
├── ./phpunit.xml  
├── ./README.md  
└── ./vite.config.js  



