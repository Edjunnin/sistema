-- --------------------------------------------------------------------
-- Estrutura + dados iniciais do banco do projeto "sistema"
-- --------------------------------------------------------------------
-- Alternativa às migrations, para quando NÃO se tem acesso ao terminal
-- (ex.: importar pelo phpMyAdmin do servidor do professor).
--
-- Como usar no phpMyAdmin:
--   1. Selecione o banco (ex.: a28408)
--   2. Aba "Importar" -> escolha este arquivo -> Executar
--
-- Como usar no terminal:
--   mysql -u root sistema < database/sistema.sql
-- --------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `Conteudo` (
    `Id`     INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `Titulo` VARCHAR(255)     NOT NULL,
    `Texto`  TEXT             NOT NULL,
    PRIMARY KEY (`Id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO `Conteudo` (`Id`, `Titulo`, `Texto`)
SELECT 1, 'Bem-vindo', 'Conteúdo da página inicial. Edite em /conteudos/editar/1.'
WHERE NOT EXISTS (SELECT 1 FROM `Conteudo` WHERE `Id` = 1);

INSERT INTO `Conteudo` (`Id`, `Titulo`, `Texto`)
SELECT 2, 'Minhas Habilidades', 'Conteúdo da página de habilidades. Edite em /conteudos/editar/2.'
WHERE NOT EXISTS (SELECT 1 FROM `Conteudo` WHERE `Id` = 2);

INSERT INTO `Conteudo` (`Id`, `Titulo`, `Texto`)
SELECT 3, 'Minha História', 'Conteúdo da página de história. Edite em /conteudos/editar/3.'
WHERE NOT EXISTS (SELECT 1 FROM `Conteudo` WHERE `Id` = 3);

INSERT INTO `Conteudo` (`Id`, `Titulo`, `Texto`)
SELECT 4, 'Planos Futuros', 'Conteúdo da página de planos futuros. Edite em /conteudos/editar/4.'
WHERE NOT EXISTS (SELECT 1 FROM `Conteudo` WHERE `Id` = 4);

INSERT INTO `Conteudo` (`Id`, `Titulo`, `Texto`)
SELECT 5, 'Contato', 'Conteúdo da página de contato. Edite em /conteudos/editar/5.'
WHERE NOT EXISTS (SELECT 1 FROM `Conteudo` WHERE `Id` = 5);
