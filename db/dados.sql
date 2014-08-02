USE luiz_recursao;

INSERT INTO ClienteCC (id, cc, cliente) VALUES
   (1, '1',  'Carlos'),
   (2, '2',  'Carlos'),
   (3, '3',  'Vanio'),
   (4, '4',  'Vanio'),
   (5, '1',  'Miguel'),
   (6, '1',  'Urus'),
   (7, '7',  'Opus'),
   (8, '8',  'Kleber'),
   (9, '9',  'Kleber'),
   (10, '10', 'Samanta'),
   (11, '8',  'Junior'),
   (12, '2',  'Samanta'),
   (13, '10', 'Rodrigo');

INSERT INTO Cliente (id, id_Grupo, nome) VALUES
   (1, NULL, 'Carlos'),
   (2, NULL, 'Vanio'),
   (3, NULL, 'Miguel'),
   (4, NULL, 'Urus'),
   (5, NULL, 'Opus'),
   (6, NULL, 'Kleber'),
   (7, NULL, 'Samanta'),
   (8, NULL, 'Junior'),
   (9, NULL, 'Rodrigo');

INSERT INTO CC (id, num, id_Grupo) VALUES
   (1, '1',  NULL),
   (2, '2',  NULL),
   (3, '3',  NULL),
   (4, '4',  NULL),
   (5, '7',  NULL),
   (6, '8',  NULL),
   (7, '9',  NULL),
   (8, '10', NULL);
