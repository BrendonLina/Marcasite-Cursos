# Iniciando projeto

Olá aqui está um passo a passo para iniciar aplicação.

passo 01: Depois de clonar crie um banco com nome marcasite_cursos, utilize php artisan key:generate.

passo 02: utilize php artisan migrate para criar as tabelas

passo 03: É necessário rodar dois seed são eles:

php artisan db:seed --class=DatabaseSeeder, php artisan db:seed --class=DatabaseSeeder

OBS:Sistema foi feito em 1 dia e meio :D, a principio seria usado o SOLID, Polices e camada Service, mas acabou não dando tempo!