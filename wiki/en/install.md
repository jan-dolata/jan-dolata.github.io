Install
===

Via Composer

``` bash
$ composer require jan-dolata/crude-crud
```

Add ServiceProvider to `config/app`.

```
JanDolata\CrudeCRUD\CrudeCRUDServiceProvider::class
```

Publish and migrate

``` bash
$ php artisan vendor:publish --provider="JanDolata\CrudeCRUD\CrudeCRUDServiceProvider"
$ php artisan migrate
```

Check config file `config/crude.php`.