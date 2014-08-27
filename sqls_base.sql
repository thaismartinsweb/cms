drop database admin;
create database admin;
use admin;

select * from user;
insert into user values(null, 1, 'Teste Thais 2', 'thais@thais', 'admin', '123', '');

select * from content;
insert into content values(null, 1, 1, 'Teste Título 1', 'Teste de Descrição', 'Teste de Content', null, now(), 1);

update content set type_page_id = 1 where id in (1,2,3);

select * from module;
drop table module;
insert into module values
(null, 'Home', 'cms', 'home', 'primary'),
(null, 'Dados do Site', 'config', 'wrench', 'success'),
(null, 'Menu', 'menu', 'tasks', 'info'),
(null, 'Content', 'content', 'quote-left', 'inverse'),
(null, 'Galeria de Fotos', 'photogallery', 'camera-retro', 'warning'),
(null, 'Fotos', 'photo', 'picture', 'danger'),
(null, 'Galeria de Videos', 'videogallery', 'film', 'primary'),
(null, 'Videos', 'photo', 'play', 'success'),
(null, 'Categoria de Produtos', 'productcategory', 'tags', 'info'),
(null, 'Produtos', 'product', 'glass', 'inverse');

update module set controller = 'cms' where id = 1;

select * from module_action;
drop table module_action;
insert into module_action values
(null, 3, 'Gerenciar Todos','index', 'pencil-square-o'),
(null, 3, 'Adicionar Novo', 'fresh', 'plus-square-o'),
(null, 4, 'Gerenciar Todos','index', 'pencil-square-o'),
(null, 4, 'Adicionar Novo', 'fresh', 'plus-square-o'),
(null, 5, 'Gerenciar Todos','index', 'pencil-square-o'),
(null, 5, 'Adicionar Novo', 'fresh', 'plus-square-o'),
(null, 6, 'Gerenciar Todos','index', 'pencil-square-o'),
(null, 6, 'Adicionar Novo', 'fresh', 'plus-square-o'),
(null, 7, 'Gerenciar Todos','index', 'pencil-square-o'),
(null, 7, 'Adicionar Novo', 'fresh', 'plus-square-o'),
(null, 8, 'Gerenciar Todos','index', 'pencil-square-o'),
(null, 8, 'Adicionar Novo', 'fresh', 'plus-square-o'),
(null, 9, 'Gerenciar Todos','index', 'pencil-square-o'),
(null, 9, 'Adicionar Novo', 'fresh', 'plus-square-o'),
(null, 10, 'Gerenciar Todos','index', 'pencil-square-o'),
(null, 10, 'Adicionar Novo', 'fresh', 'plus-square-o');

insert into type_page values
(null, 'Página com imagem destaque no topo', 'Modelo de página com uma imagem grande em destaque no topo do página', '', 'page_top.png');

update type_page
set image = 'page_top.png'
where id = 1;

select * from config;
select * from menu;
select * from content;
select * from type_page;

drop table content;