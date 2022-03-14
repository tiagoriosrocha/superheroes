## Sobre o projeto

A aplicação carrega uma lista de super-heróis de um arquivo CSV e permite consulta a partir do nome do super-herói.

## Tecnologias utilizadas

Experimento usando as seguintes tecnologias:
- Laravel
- Vue.js
- Vuetify (datatable)
- Rap2hpoutre\FastExcel

## Apresentação do experimento

Link: https://youtu.be/g0AWCFOJl1M
Source-code: https://github.com/tiagoriosrocha/superheroes

### Como fazer funcionar o projeto
Faça download do conjunto de bibliotecas que o Laravel usa atravé do comando:
composer update

Gere um novo arquivo .env a partir do arquivo de exemplo que está no projeto:
cp .env.example .env

Gere a chave criptografada para a aplicação através do comando:
php artisan key:generate

Coloque a funcionar o projeto:
php artisan serve

Acesse o navegador através do link:
http://localhost:8000/
