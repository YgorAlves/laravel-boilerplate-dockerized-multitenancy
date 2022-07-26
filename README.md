<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p>


## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

## Run the project
To test subdomains, you will need to add to your hosts file:
127.0.0.1 dev.saas demo.saas error.saas


# Migrations

### Path flag
    php artisan make:migration create_tenants_table --path=database/migrations/landlord

### Database flag
    php artisan migrate --database=landlord --path=database/migrations/landlord

### Migrate tenants
    php artisan tenants:migrate {tenant?} {--fresh} {--seed} -> refer to file TenantsMigrate.php



# Patterns to be followed
### Exceptions
Never throw an hardcoded error, if the exception does not exists in app/exceptions, create it and configure based on existing ones:

    - php artisan make:exception NAME_OF_EXCEPTION




# DevOps Roadmap

- [X] -> Code (Jira, Git)
- [ ] -> Build (Gradle, Maven)
- [ ] -> Test (Se, JUnit, PHPUnit*)
- [ ] -> Release (Jenkins)
- [ ] -> Deploy (DC/OS, Docker, Aws, CI/CD)
- [ ] -> Operate (Mesos, Ansible, Kubernetes)
- [ ] -> Monitor ()Nagios, Splunk, Datadog
- [ ] -> 

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
