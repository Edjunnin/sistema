<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
use RuntimeException;
class PromoverAdministrador extends Seeder
{
public function run()
{
$users = auth()->getProvider();
$user = $users->findByCredentials([
'email' => 'edjun@teste.local',
]);
if ($user === null) {
throw new RuntimeException('Usuário não encontrado.');
}
if (! $user->inGroup('admin')) {
$user->addGroup('admin');
}
}
}