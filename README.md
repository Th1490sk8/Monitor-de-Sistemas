# 🛠️ Monitor de Sistemas - Resende-Tech

Sistema de monitoramento e gerenciamento de status de equipamentos, desenvolvido para controle de operabilidade, falhas e manutenções.

## 🚀 Funcionalidades
- **Dashboard Dinâmico**: Visualização rápida do total de máquinas, equipamentos em manutenção e em falha.
- **Gerenciamento de Máquinas**: Cadastro e exclusão de equipamentos com atualização em tempo real.
- **Simulação de Falha**: Interface interativa para testes de sistema.
- **Arquitetura Organizada**: Separação clara entre lógica de negócio, rotas e visualização.

## 🏗️ Arquitetura do Projeto
O projeto foi reestruturado para seguir boas práticas de desenvolvimento PHP, utilizando uma organização modular:

- **`/acoes`**: Scripts de processamento (Salvar/Deletar).
- **`/assets`**: Recursos estáticos (CSS/JS).
- **`/config`**: Configurações de banco de dados e conexão PDO.
- **`/funcoes`**: Camada de lógica e consultas SQL (Data Access).
- **`/includes`**: Componentes reutilizáveis e arquivos de visualização (Views).
- **`index.php`**: Ponto de entrada que coordena o carregamento dos dados e das views.

## 🛠️ Tecnologias Utilizadas
- **PHP 8.x**
- **PDO (PHP Data Objects)**: Para uma conexão segura e preparada contra SQL Injection.
- **MySQL/MariaDB**: Banco de dados relacional.
- **Composer**: Gerenciador de dependências.
- **CSS3 & JavaScript**: Interface responsiva e interativa.

## 🔧 Como instalar
1. Clone o repositório.
2. Certifique-se de ter o MySQL rodando e crie o banco de dados conforme as tabelas em `/config/criar_tabela.php`.
3. Configure o arquivo `.env` ou `conexao.php` com suas credenciais locais.
4. Execute `composer install` para baixar as dependências.
5. Acesse via `localhost:8000`.

---
Desenvolvido por **Thiago Barbosa** - Estudo de PHP Profissional.