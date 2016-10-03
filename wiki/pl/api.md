Api
===

## Ustawienia

config/crude.php

```php
    /**
     * Route prefix
     * @var string
     */
    'routePrefix' => 'crude',

    /**
     * Routes middleware
     * @var string | array
     */
    'middleware' => ['web', 'auth'],
```

## Pobieranie kolekcji

GET `'routePrefix'/api/{crudeName}`

z danymi

```javascript
{
    page:           1,      // integer, numer strony
    numRows:        10,     // integer, liczba pozycji na stronie
    sortAttr:       'id',   // string, nazwa atrybutu sortowania (zgodan z tą w qwerze)
    sortOrder:      'asc',  // string, kierunek sortowania 'asc' / 'desc'
    searchAttr:     'id',   // string, nazwa atrybutu filtrowania (zgodan z tą w qwerze)
    searchValue:    ''      // string, fragment wartości do filtrowania
}
```

zwraca

```javascript
{
    "data":
    {
        "collection": [],
        "pagination": {
            "page":     1,
            "numRows":  20,
            "numPages": 1,      // liczba wszystkich stron
            "count":    1       // liczba wszystkich elementów
        },
        "sort": {
            "attr":     "id",
            "order":    "asc"
        },
        "search": {
            "attr":     "id",
            "value":    ""
        }
    }
}
```


## Dodawanie i edycja

POST `'routePrefix'/api/{crudeName}` z danymi nowego modelu
PUT `'routePrefix'/api/{crudeName}/{id}` z danymi istniejącego modelu

zwraca dane modelu

```javascript
{
    "data":
    {
        "model":    {...},  // object, atrybuty modelu po zapisie
        "message":  ' '
    }
}
```

lub listę błędów po walidacji

```javascript
{
    "attrName1":    ["error 1", "error 2" ...],
    "attrName2":    [...],
    ...
}
```

## Usuwanie

DELETE `'routePrefix'/api/{crudeName}/{id}`

zwraca

```javascript
{
    "data": {
        "message":  'Element został usunięty.'
    }
}
```

## Auto-uzupełnianie

GET `'routePrefix'/autocomplete/get/{crudeName}/{attr}`

z danymi

```javascript
{
    term: '' // string, fragment szukanej wartości
}
```

zwraca listę

```javascript
{
    0: {
        id: "1",            // mixed, id pierwszego modelu
        label: "Label 1"    // string, etykieta pierwszego modelu
    },
    1: {
        ...
    }
    ...
}
```

POST `'routePrefix'/autocomplete/label`

z danymi

```javascript
{
    crudeName:  'name',     // string
    attr:       'attrName', // string, nazwa atrybutu
    value:      '1'         // string
}
```

zwraca

```javascript
'label' // 'string', label
```
