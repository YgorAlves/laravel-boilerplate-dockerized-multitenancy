<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p>


## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.


## Rodar o projeto
Para testar subdomains, é necessário adicionar ao hosts:
127.0.0.1 dev.saas demo.saas error.saas


# Migrations

## Path flag
    php artisan make:migration create_tenants_table --path=database/migrations/landlord

## Database flag
    php artisan migrate --database=landlord --path=database/migrations/landlord

## Migrate tenants
    php artisan tenants:migrate {tenant?} {--fresh} {--seed} -> refer to file TenantsMigrate.php



# Padrões a serem seguidos
## Exceptions
Nunca joguem uma excessao e retornem o erro e status na mão para o frontend, criem uma excessão com:
    - php artisan make:exception NOMEDAEXCEPTION e a configurem corretamente com base em já existentes.




# DevOps Roadmap

[X] -> Code (Jira, Git)
[ ] -> Build (Gradle, Maven)
[ ] -> Test (Se, JUnit, PHPUnit*)
[ ] -> Release (Jenkins)
[ ] -> Deploy (DC/OS, Docker, Aws, CI/CD)
[ ] -> Operate (Mesos, Ansible, Kubernetes)
[ ] -> Monitor ()Nagios, Splunk, Datadog
[ ] -> 

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
