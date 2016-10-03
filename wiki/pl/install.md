Instalacja
===

Przez Composer

``` bash
$ composer require jan-dolata/crude-crud
```

Dodaj ServiceProvider w `config/app`.

```
JanDolata\CrudeCRUD\CrudeCRUDServiceProvider::class
```

Opublikuj i wykonaj migracje

``` bash
$ php artisan vendor:publish --provider="JanDolata\CrudeCRUD\CrudeCRUDServiceProvider"
$ php artisan migrate
```

Sprawdź ustawienia w pliku konfiguracyjnym `config/crude.php`.
