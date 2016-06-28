# Instalacja

Wykorzystując Composer

```
$ composer require jan-dolata/crude-crud
```

Dodaj ServiceProvider do `config/app`.

```
JanDolata\CrudeCRUD\CrudeCRUDServiceProvider::class
```

Opublikuj i uruchom migracje

``` bash
$ php artisan vendor:publish --provider="JanDolata\CrudeCRUD\CrudeCRUDServiceProvider"
$ php artisan migrate
```

Przejdź i popraw `config/crude.php`.