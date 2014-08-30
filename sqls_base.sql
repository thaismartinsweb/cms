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
(null, 'Dados do Site', 'config', 'cogs', 'success'),
(null, 'Menu', 'menu', 'tasks', 'info'),
(null, 'Conteúdo', 'content', 'quote-left', 'inverse'),
(null, 'Galeria de Fotos', 'photogallery', 'camera-retro', 'warning'),
(null, 'Fotos', 'photo', 'picture', 'danger'),
(null, 'Galeria de Videos', 'videogallery', 'film', 'module'),
(null, 'Videos', 'video', 'play', 'success'),
(null, 'Categoria de Produtos', 'productcategory', 'tags', 'info'),
(null, 'Produtos', 'product', 'glass', 'inverse'),
(null, 'Contatos', 'form', 'envelope-alt', 'warning'),
(null, 'Ajuda', 'help', 'info', 'danger');

update module set title = 'Contatos' where id = 11;

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

select * from type_menu;
insert into type_menu values
(null, 'Conteúdo', 'conteudo'),
(null, 'Notícias', 'noticias'),
(null, 'Produtos', 'produtos'),
(null, 'Galeria de Fotos', 'fotos'),
(null, 'Galeria de Videos', 'videos'),
(null, 'Contato', 'contato');

insert into type_page values
(null, 'Página com imagem destaque no topo', 'Modelo de página com uma imagem grande em destaque no topo do página', 'simple_page_top', 'page_top.png');

select * from config;
select * from menu;
select * from content;


drop table content;
drop table menu;

select * from module;
select * from module_action;
select * from type_page;
select * from type_menu;

select * from menu where menu_id = 0;