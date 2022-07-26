<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

# About the project
This project is a boilerplate to a multitenant architecture, as described below, it already has the migrations configured and its paths, and also has the user's table inside all tenants, with working Authentication using JWT, you can test it with the seeder's user (pass: 1234).

The database is decided by the URL that recieves the request, so in production you need a wildcard domain with a reverse proxy (probably, still studying).
dev.project.com.br -> database to be connected: dev
test.project.com.br -> database to be connected: test

You can check the TenancyProvider to understand more about the dynamic database connection. aka: multitenant



## Run the project
To test subdomains, you will need to add to your hosts file:
127.0.0.1 dev.saas demo.saas error.saas


# Migrations

### Path flag - Make migration to the LandLord Database Path
    php artisan make:migration create_tenants_table --path=database/migrations/landlord

### Database flag - Migrate only the LandLord Database's Migrations
    php artisan migrate --database=landlord --path=database/migrations/landlord

### Migrate tenants - Migrate one or all tenants, with option to fresh and/or seed them
    php artisan tenants:migrate {tenant?} {--fresh} {--seed} -> refer to file TenantsMigrate.php




# Patterns to be followed
### Exceptions
Never throw an hardcoded error, if the exception does not exists in app/exceptions, create it and configure based on existing ones:

    php artisan make:exception NAME_OF_EXCEPTION




# DevOps Roadmap (My personal)

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
