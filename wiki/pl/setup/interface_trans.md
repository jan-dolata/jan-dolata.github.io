Lokalizacja
===

W `config.crude` możesz zmienić domyślny plik z etykietami interfejsu.

```php
/**
 * Default interface and api translation file
 * @var string
 */
'defaultInterfaceTrans' => 'CrudeCRUD::crude',
```

W paczce udostępnione są dwa języki, polski (pl) i angielski (en), które automatycznie przeładowują się po zmianie lokalizacji twojej aplikacji (jak w przypadku plików z katalogu `lang`). Jeżeli chcesz obsługiwać inne języki lub nie odpowiadają ci domyślne wartości, konieczne będzie ustawienie `defaultInterfaceTrans`. Do wybranego pliku wklej domyślne wartości podane poniżej.

---

Istnieje możliwość ustawienia etykiet w obrębie wybranej listy. Wystarczy użyć `setInterfaceTrans`

```php
$this->crudeSetup->setInterfaceTrans('jeden_z_kluczy', 'nowa wartość');
\\ lub
$this->crudeSetup->setInterfaceTrans([
    'jeden_z_kluczy' => 'nowa wartość',
    'inny_klucz_z_listy' => 'inna wartość'
]);
\\ lub, gdzie 'plik_z_etykietami_crude' nie musi zawierać wszystkich etykiet
$this->crudeSetup->setInterfaceTrans(trans('plik_z_etykietami_crude'));
```

Przykład:
```php
$this->crudeSetup->setInterfaceTrans([
    'add' => 'Dodaj nową książkę',
    'add_mode' => 'Dodajesz nową książkę',
    'action' => [
        'form' => 'Edytuj dane książki',
    ],
    'item_has_been_saved' => 'Nowa książka została dodana do katalogu.',
]);
```

---

Domyślne wartości (pl):
```php
[
    'save' => 'Zapisz',
    'cancel' => 'Anuluj',
    'edit' => 'Edytuj',
    'delete' => 'Usuń',
    'add' => 'Dodaj',
    'close' => 'Zamknij',
    'submit' => 'Zatwierdź',
    'empty_list' => 'Lista jest pusta',
    'tools' => 'Narzędzia',
    'order' => 'Kolejność',

    'add_mode' => 'Dodajesz',
    'edit_mode' => 'Edytujesz',

    'yes' => 'Tak',
    'no' => 'Nie',

    'extort_csv' => 'CSV',
    'search_value' => 'Szukaj',
    'drop_file_here' => 'Upuść plik lub kliknij tutaj',

    'update_delay' => 'Dane z przed',

    'markdown_preview' => 'Podgląd',

    'action' => [
        'form' => 'Edytuj',
        'map' => 'Edytuj lokalizację',
        'file' => 'Dodaj / Usuń pliki',
        'thumbnail' => 'Dodaj / Usuń miniaturę'
    ],

    'confirm_delete' => [
        'title' => 'Usuń',
        'content' => 'Jesteś pewny/a?',
        'cancel' => 'Anuluj',
        'confirm' => 'Usuń'
    ],

    'order_list' => [
        'title' => 'Nowa kolejność',
        'content' => 'Ustaw nową kolejność',
        'cancel' => 'Anuluj',
        'confirm' => 'Zapisz'
    ],

    'item_has_been_saved' => 'Element został dodany.',
    'item_has_been_updated' => 'Element został zapisany.',
    'item_has_been_removed' => 'Element został usunięty.',
    'item_has_been_restored' => 'Element został przywrócony.',

    'new_order_saved' => 'Nowa kolejność została zapisana.',

    'input_placeholder' => [
        'text' => 'tekst',
        'number' => 'liczba',
        'textarea' => 'długi tekst',
        'autocomplete' => 'autouzupełnianie',
        'datetime' => 'data i godzina',
        'select' => 'lista',
        'json' => 'JSON',
        'markdown' => 'markdown'
    ],

    'dictMaxFilesExceeded' => 'Przekroczono limit plików'
]
```
