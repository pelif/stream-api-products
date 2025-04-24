#API Desenvolvida no ensino da playlist de API's com Laravel no Canal do Youtube

##Endereço a playlist 
https://www.youtube.com/playlist?list=PL-8RFmPUNEl80zjpQwUDs3Zcp01nXvR3P

##Intruções para rodar o projeto

* Tenha o docker e docker compose instalado na sua máquina
* Na raíz do projeto rode o comando '''docker compose up -d''' isso irá subir seu banco de dados
* Crie seu .env e Configure as credenciais do seu .env com as mesmas credenciais de banco de dados definidas no docker-compose.yml
* Na raíz do seu projeto rode os comandos: '''php artisan serve''' , '''php artisan migration''' e '''php artisan db:seed'''
Obs: Estes comandos vão subir o servidor do php artisan , gerar as tabelas necessários no nosso banco de dados e também fazer a pré carga automática de algumas 
categorias e produtos

