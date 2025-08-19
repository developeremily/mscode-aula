-- Criar o banco de dados (já é criado automaticamente, mas deixamos aqui por segurança)
CREATE DATABASE IF NOT EXISTS escola_joins;
USE escola_joins;

-- Tabela de Alunos
CREATE TABLE IF NOT EXISTS alunos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    idade INT,
    cidade VARCHAR(100)
);

-- Tabela de Cursos
CREATE TABLE IF NOT EXISTS cursos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome_curso VARCHAR(100) NOT NULL,
    professor VARCHAR(100)
);

-- Tabela de Matrículas
CREATE TABLE IF NOT EXISTS matriculas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    aluno_id INT,
    curso_id INT,
    data_matricula DATE,
    FOREIGN KEY (aluno_id) REFERENCES alunos(id),
    FOREIGN KEY (curso_id) REFERENCES cursos(id)
);

-- Inserir alunos
INSERT INTO alunos (nome, idade, cidade) VALUES
('Ana Silva', 20, 'São Paulo'),
('Carlos Oliveira', 22, 'Rio de Janeiro'),
('Maria Santos', 21, 'São Paulo'),
('João Pereira', 23, 'Belo Horizonte'),
('Fernanda Lima', 19, 'Curitiba'),
('Pedro Costa', 24, NULL);

-- Inserir cursos
INSERT INTO cursos (nome_curso, professor) VALUES
('Matemática', 'Prof. Silva'),
('História', 'Prof. Oliveira'),
('Geografia', 'Prof. Santos'),
('Inglês', 'Prof. Johnson'),
('Artes', NULL);

-- Inserir matrículas
INSERT INTO matriculas (aluno_id, curso_id, data_matricula) VALUES
(1, 1, '2024-01-15'),
(1, 3, '2024-01-16'),
(2, 2, '2024-01-17'),
(3, 1, '2024-01-18'),
(3, 4, '2024-01-19'),
(4, 3, '2024-01-20'),
(5, 5, '2024-01-21');
