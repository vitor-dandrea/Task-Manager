# Task Manager

Sistema de gerenciamento de tarefas desenvolvido em Laravel com operações CRUD (criar, ler, atualizar e deletar), contendo regras de negócio para controle dos status das tarefas.

## Observação
  
### A Parte 1 deste README contém as respostas teóricas, mantidas aqui exclusivamente como meio de facilitar sua consulta.

## Parte 1 - Conceitos Teóricos

#### O que são Service Providers em Laravel e para que servem?

Um service provider é uma classe para encapsular a lógica que várias partes de uma aplicação precisam executar para inicializar sua funcionalidade principal.

#### Qual a diferença entre hasOne e hasMany no Eloquent ORM?

Trata-se de uma diferença de relacionamento. Enquanto hasOne trata de relacionamentos de 1:1 (um para um), hasMany trata de relacionamentos 1:N (um para muitos).

#### O que é Dependency Injection e como ela é usada no Laravel?

Dependency Injection permite que as dependências de uma classe sejam injetadas externamente. No Laravel, o container IoC gerencia isso automaticamente, resolvendo e injetando dependências com autowiring e bindings em service providers.

#### Explique o conceito de middleware e dê um exemplo de uso.

Um middleware pode inspecionar requisições HTTP e modificá-las ou rejeitá-las. Serve como um intermediário entre o controller e/ou a resposta ao cliente. O exemplo mais comum é a sua utilização para autenticar usuários antes de conceder o acesso as rotas.

#### Como funcionam migrations e quais suas vantagens?

 Migrations funcionam a partir de dois métodos: up() e down (). Um para fazer as ações de sua migration e um para desfazê-las. Migrations facilitam a definição da estrutura do banco de dados com migrations baseadas em código. Cada nova tabela, coluna, índice e chave pode ser definida em código, e qualquer novo ambiente pode ser configurado, transformando bancos de dados.

#### O que é Queue no Laravel e quando usá-la?

A queue () é uma função nativa do Laravel para permitir o processamento de tarefas em segundo plano de forma assíncrona. Evitando sobrecargas e demoras.

#### Explique a diferença entre API Resource e um Controller tradicional.

Quando você trabalha em cima de APIs RESTful, a lista de ações possíveis de um API resource não é a mesma que a de um Controller tradicional. Um API Resource pode, por exemplo, transformar e padronizar seus dados antes de enviá-los.


## Parte 2 - Desenvolvimento Prático

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

- Alguns dos conceitos abordados na Parte 1 do projeto também foram implementados para garantir seu desenvolvimento ou sua otimização. Tais como os migrations para desenvolver o banco de dados e o API resource.
