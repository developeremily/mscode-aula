Instale o PHP
```bash
sudo apt install php-cli
```

Instale o driver PDO MySQL. No Linux, use:

```bash
sudo apt install php-mysql
```

# Como executar comandos SQL com PDO (PHP)

## SELECT
```php
$stmt = $conn->query('SELECT * FROM alunos');
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
```

## INSERT
```php
$sql = 'INSERT INTO alunos (nome, idade) VALUES (:nome, :idade)';
$stmt = $conn->prepare($sql);
$stmt->execute(['nome' => 'João', 'idade' => 20]);
```

## UPDATE
```php
$sql = 'UPDATE alunos SET idade = :idade WHERE nome = :nome';
$stmt = $conn->prepare($sql);
$stmt->execute(['idade' => 21, 'nome' => 'João']);
```

## DELETE
```php
$sql = 'DELETE FROM alunos WHERE nome = :nome';
$stmt = $conn->prepare($sql);
$stmt->execute(['nome' => 'João']);
```

---

# Como executar SQL de modo geral
Você pode executar qualquer comando SQL usando o método `query` (para comandos simples) ou `prepare` + `execute` (para comandos com parâmetros).

---

# Defesa contra SQL Injection
Sempre use `prepare` e parâmetros em vez de concatenar valores diretamente na query. Isso evita que usuários maliciosos insiram comandos perigosos.

**Exemplo seguro:**
```php
$sql = 'SELECT * FROM alunos WHERE nome = :nome';
$stmt = $conn->prepare($sql);
$stmt->execute(['nome' => $nome]);
```

---

# O que é SQL Injection?
SQL Injection é uma técnica de ataque onde uma pessoa mal-intencionada insere comandos SQL diretamente em campos de entrada (como formulários) para manipular o banco de dados de forma não autorizada.

Isso acontece quando o código do servidor monta a query SQL juntando textos e valores do usuário sem proteção. Assim, o invasor pode alterar, apagar ou acessar dados que não deveria.

**Exemplo simples:**
Se o código faz:
```php
$sql = "SELECT * FROM alunos WHERE nome = '$nome'";
```
E o usuário digita:
```
João' OR '1'='1
```
A consulta vira:
```
SELECT * FROM alunos WHERE nome = 'João' OR '1'='1'
```
O banco retorna todos os alunos, ignorando o filtro!

**Por isso, sempre use parâmetros preparados para evitar esse tipo de ataque.**

---

# Exemplo de SQL Injection (NÃO FAÇA ISSO!)
```php
// Suponha que $nome venha de um formulário
$sql = "SELECT * FROM alunos WHERE nome = '$nome'";
$stmt = $conn->query($sql);
```
Se o usuário digitar:
```
João' OR '1'='1
```
A query vira:
```
SELECT * FROM alunos WHERE nome = 'João' OR '1'='1'
```
Isso retorna todos os alunos!

**Sempre use parâmetros para evitar esse problema.**

---

# Exemplo de SQL Injection com UPDATE (NÃO FAÇA ISSO!)
```php
// Suponha que $nome e $idade venham de um formulário
$sql = "UPDATE alunos SET idade = $idade WHERE nome = '$nome'";
$stmt = $conn->query($sql);
```
Se o usuário digitar:
```
João' OR '1'='1
```
A query vira:
```
UPDATE alunos SET idade = 99 WHERE nome = 'João' OR '1'='1'
```
Isso atualiza a idade de todos os alunos!

---

# Exemplo de SQL Injection com DELETE (NÃO FAÇA ISSO!)
```php
// Suponha que $nome venha de um formulário
$sql = "DELETE FROM alunos WHERE nome = '$nome'";
$stmt = $conn->query($sql);
```
Se o usuário digitar:
```
João' OR '1'='1
```
A query vira:
```
DELETE FROM alunos WHERE nome = 'João' OR '1'='1'
```
Isso apaga todos os alunos!

**Sempre use parâmetros para evitar esse problema.**
