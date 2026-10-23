<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Popula a tabela "Conteudo" com os registros usados pelas páginas.
 *
 * Os ids correspondem ao que os controllers buscam:
 *   1 = home, 2 = minhahab, 3 = minhahis, 4 = planofuturo, 5 = contato
 *
 * Rode com:
 *
 *     php spark db:seed ConteudoSeeder
 */
class ConteudoSeeder extends Seeder
{
    public function run()
    {
        $dados = [
            [
                'Id'     => 1,
                'Titulo' => 'Bem-vindo',
                'Texto'  => 'Conteúdo da página inicial. Edite em /conteudos/editar/1.',
            ],
            [
                'Id'     => 2,
                'Titulo' => 'Minhas Habilidades',
                'Texto'  => 'Conteúdo da página de habilidades. Edite em /conteudos/editar/2.',
            ],
            [
                'Id'     => 3,
                'Titulo' => 'Minha História',
                'Texto'  => 'Conteúdo da página de história. Edite em /conteudos/editar/3.',
            ],
            [
                'Id'     => 4,
                'Titulo' => 'Planos Futuros',
                'Texto'  => 'Conteúdo da página de planos futuros. Edite em /conteudos/editar/4.',
            ],
            [
                'Id'     => 5,
                'Titulo' => 'Contato',
                'Texto'  => 'Conteúdo da página de contato. Edite em /conteudos/editar/5.',
            ],
        ];

        $tabela = $this->db->table('Conteudo');

        foreach ($dados as $linha) {
            // Insere só o que ainda não existe, para poder rodar o
            // seeder mais de uma vez sem duplicar registros.
            $existe = $tabela->where('Id', $linha['Id'])->countAllResults() > 0;

            if (! $existe) {
                $tabela->insert($linha);
            }
        }
    }
}
