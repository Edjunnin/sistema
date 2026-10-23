<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Cria a tabela "Conteudo" usada pelo ConteudoModel.
 *
 * Com esta migration o banco pode ser recriado do zero em qualquer
 * máquina (casa, laboratório, servidor do professor) com:
 *
 *     php spark migrate
 */
class CreateConteudo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'Id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'Titulo' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'Texto' => [
                'type' => 'TEXT',
                'null' => false,
            ],
        ]);

        $this->forge->addKey('Id', true);

        // O segundo parâmetro evita erro se a tabela já existir
        // (ex.: no servidor do professor, onde ela já está criada).
        $this->forge->createTable('Conteudo', true);
    }

    public function down()
    {
        $this->forge->dropTable('Conteudo', true);
    }
}
