# Sistema

Projeto da faculdade em **CodeIgniter 4.7.4** (PHP), com páginas de conteúdo
(Home, Habilidades, História, Planos, Contato), um CRUD simples de conteúdos
gravados no banco e **autenticação com CodeIgniter Shield**.

---

## Requisitos

- **PHP 8.2 ou superior** com as extensões `intl`, `mbstring` e `mysqli`
- **MySQL** ou **MariaDB**
- **Composer** (para instalar as dependências — inclusive o Shield)

---

## Rodando no seu computador

```powershell
composer install
```

Crie o arquivo `.env` a partir do modelo:

```powershell
Copy-Item .env.example .env
```

Crie o banco, as tabelas do projeto e as tabelas do Shield:

```powershell
mysql -u root -e "CREATE DATABASE sistema CHARACTER SET utf8mb4"
php spark migrate --all
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

## Autenticação (CodeIgniter Shield)

Instalação, conforme o material da disciplina:

```powershell
composer require codeigniter4/shield
php spark shield:setup
php spark migrate --all
php spark routes
```

O `shield:setup` gera `app/Config/Auth.php`, `AuthGroups.php` e `AuthToken.php`,
registra os helpers `auth` e `setting`, ajusta o CSRF e cria as migrations.
A chamada `service('auth')->routes($routes);` fica em `app/Config/Routes.php`
**uma única vez** — se o assistente já inseriu, não duplique.

Rotas criadas pelo Shield:

| Rota | Função |
|------|--------|
| `/login` | Tela de login |
| `/register` | Cadastro de usuário |
| `/logout` | Encerrar sessão |
| `/login/magic-link` | Login por link mágico |

Para proteger um grupo de rotas (exemplo do material):

```php
$routes->group('admin', ['filter' => 'session'], static function ($routes) {
    $routes->get('/', 'Admin::index');
});
```

> Não aplique o filtro `session` globalmente: as telas de login e cadastro
> precisam continuar públicas.

---

## Publicando no servidor da faculdade

1. **Envie os arquivos** do projeto para o servidor, mantendo a pasta
   `vendor/` que já existe lá (ela não vai no Git).
2. **Atualize as dependências no servidor**, porque o Shield é novo:

   ```bash
   composer install
   ```

   Sem isso o site quebra com `Call to a member function routes() on null`.
3. **Crie as tabelas do Shield** no banco do servidor:

   ```bash
   php spark migrate --all
   ```

4. O documento raiz do site deve apontar para a pasta **`public/`**:
   `.../ads209/sistema/public/`
5. **Não precisa criar `.env`**: os valores padrão em `app/Config`
   já apontam para o servidor.
6. Se a tabela `Conteudo` estiver vazia, importe `database/sistema.sql`
   pelo phpMyAdmin (a importação não duplica registros).
7. A pasta `writable/` precisa ter permissão de escrita para o servidor web.

---

## Banco de dados

A tabela `Conteudo` tem a coluna `Id` (com "I" maiúsculo), `Titulo` e
`Texto`. Os registros correspondem às páginas:

| Id | Página |
|----|----------------|
| 1  | Home           |
| 2  | Habilidades    |
| 4  | Planos futuros |
| 5  | Contato        |

Três formas de criar o banco:

- `php spark migrate --all` + `php spark db:seed ConteudoSeeder` (recomendado)
- Importar `database/sistema.sql` no phpMyAdmin
- O banco do servidor da faculdade já está pronto

O Shield cria ainda `users`, `auth_identities`, `auth_logins`,
`auth_groups_users`, `auth_permissions_users`, `auth_remember_tokens`,
`auth_token_logins` e `settings`.

---

## Estrutura principal

```
app/
  Config/        configuração (URL, banco, rotas, Shield)
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
| `/` | Página inicial (mesma da Home) |
| `/home` | Página inicial |
| `/minhahab` | Habilidades |
| `/minhahis` | História |
| `/planofuturo` | Planos futuros |
| `/contato` | Contato |
| `/conteudos` | Lista dos conteúdos |
| `/conteudos/editar/{id}` | Editar conteúdo |
| `/login` | Login (Shield) |
| `/register` | Cadastro (Shield) |

---

## Problemas comuns

| Sintoma | Causa |
|---|---|
| `Call to a member function routes() on null` | Shield declarado mas ausente na `vendor/` → rode `composer install` |
| `Table 'sistema.users' doesn't exist` | faltam as tabelas do Shield → `php spark migrate --all` |
| Conflito no `git pull` em arquivos que você não editou | fim de linha (CRLF × LF) → já resolvido pelo `.gitattributes` |
| Página sem estilo | `baseURL` no `.env` diferente da porta usada |
