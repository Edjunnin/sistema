# Sistema

Projeto da faculdade em **CodeIgniter 4** (PHP), com páginas de conteúdo
(Home, Habilidades, História, Planos, Contato) e um CRUD simples de
conteúdos gravados no banco de dados.

---

## Requisitos

- **PHP 8.2 ou superior** com as extensões `intl`, `mbstring` e `mysqli`
- **MySQL** ou **MariaDB**
- **Composer** (apenas para instalar as dependências)

---

## Rodando no seu computador

```powershell
composer install
```

Crie o arquivo `.env` a partir do modelo:

```powershell
Copy-Item .env.example .env
```

Crie o banco e as tabelas:

```powershell
mysql -u root -e "CREATE DATABASE sistema CHARACTER SET utf8mb4"
php spark migrate
php spark db:seed ConteudoSeeder
```

Suba o servidor:

```powershell
php spark serve --port 8081
```

Acesse **http://localhost:8081/home**

> A porta 8080 pode estar ocupada em alguns computadores; por isso o
> exemplo usa a 8081. Se usar outra, ajuste `app.baseURL` no `.env`.

---

## Publicando no servidor da faculdade

1. **Envie os arquivos** do projeto para o servidor, mantendo a pasta
   `vendor/` que já existe lá (ela não vai no Git).
2. O documento raiz do site deve apontar para a pasta **`public/`**:
   `.../ads209/sistema/public/`
3. **Não precisa criar `.env`**: os valores padrão em `app/Config`
   já apontam para o servidor.
4. O banco `a28408` já existe. Se a tabela `Conteudo` estiver vazia,
   importe `database/sistema.sql` pelo phpMyAdmin (a importação não
   duplica registros).
5. A pasta `writable/` precisa ter permissão de escrita para o
   servidor web.

Se as credenciais do servidor mudarem, crie um `.env` lá com os
valores novos (veja `.env.example`).

---

## Banco de dados

A tabela `Conteudo` tem a coluna `Id` (com "I" maiúsculo), `Titulo` e
`Texto`. Os registros 1 a 5 correspondem às páginas:

| Id | Página |
|----|----------------|
| 1  | Home           |
| 2  | Habilidades    |
| 3  | História       |
| 4  | Planos futuros |
| 5  | Contato        |

Três formas de criar o banco:

- `php spark migrate` + `php spark db:seed ConteudoSeeder` (recomendado)
- Importar `database/sistema.sql` no phpMyAdmin
- O banco do servidor da faculdade já está pronto

---

## Estrutura principal

```
app/
  Config/        configuração (URL, banco, rotas)
  Controllers/   ConteudoController (páginas + CRUD)
  Models/        ConteudoModel
  Views/         layout, menu e páginas
  Database/      migrations e seeder
database/
  sistema.sql    estrutura + dados iniciais (para phpMyAdmin)
public/
  assets/css/    estilo.css
  index.php      ponto de entrada
```

---

## Rotas

| Rota | Descrição |
|------|-----------|
| `/home` | Página inicial |
| `/minhahab` | Habilidades |
| `/minhahis` | História |
| `/planofuturo` | Planos futuros |
| `/contato` | Contato |
| `/conteudos` | Lista dos conteúdos |
| `/conteudos/editar/{id}` | Editar conteúdo |
