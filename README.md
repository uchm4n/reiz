
## Reiz demo project

# Stats
 - PHP 8.2 (ubuntu:22.04, with all necessary extensions)
 - Xdebug (on port 9003)
 - Node 20
 - Laravel Sail (for containers)
 - Redis
 - Mysql
 - Supervisor
 - Laravel Queues (using supervisor)
 - symfony/browser-kit (for data scraping)
 - Livewire (for main web page)

# Instruction
##### Run Laravel Sail's up command. (you have to have a docker running):

 -  `./vendor/bin/sail build`
 - `./vendor/bin/sail up`
By doing this, all of your application's Docker containers will be started.

##### Install composer packages
- `sail composer install`
- copy `.env.example` -> `.env `
- run `sail artisan migrate:install`
- `sail artisan db:seed`

#### Testing
- `sail artisan test` (it should test get/post/delete endpoints)







