
## Reiz demo project

# Stats
 - PHP 8.2 (ubuntu:22.04, with all necessary extensions)
 - Xdebug 3 (enabled port 9003)
 - Node 20
 - Laravel Sail (for containers)
 - Redis
 - Mysql 8
 - Supervisor
 - Laravel Queues (using supervisor)

# Instruction 
> Install composer packages
 - composer install

> Copy .env.example -> .env 



> Run Laravel Sail's up command. (you have to have a docker running):
 -  ./vendor/bin/sail build
 - ./vendor/bin/sail up
 
  Or if you want Docker to run in the background:

 - ./vendor/bin/sail up -d

By doing this, all of your application's Docker containers will be started.









