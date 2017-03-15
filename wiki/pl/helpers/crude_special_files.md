Pliki specjalne
===

Pliki specjalne to pliki nie związane z żadną tabelą. Mechanizm pozwala dodać, a następnie podmienić plik oraz pobrać go.

---

Po opublikowaniu paczki zajrzyj do pliku `config/crude_special_files.php`, ustawisz w nim:
* `files` - listę plików;
* `trans` - klucz do translacji z listą nazw plików;
* `storage` - nazwa katalogu plików w `storage/app`;
* `uploadMiddleware` i `downloadMiddleware` - middleware'y zabezpieczające pobieranie i zapisywanie plików.

---

W `CrudeSpecialFiles` znajdziesz pomocnicze metody:
* `getList()` - do pobierania listy plików, wraz z danymi przechowywanego pliku;
* `downloadData($key)` - zwraca dane do pobrania pliku o wskazanej nazwie w `$key`;
* `upload($file, $key)` - pozwala zapisać plik pod wskazaną nazwą w `$key`.

---

Dodatkowe adresy:
* `'routePrefix'/upload/{name}` - do zapisu pliku o wskazanej nazwie, nazwa routa `special_file_upload`, middleware'y z `uploadMiddleware`;
* `'routePrefix'/download/{name}` - do pobrania pliku o wskazanej nazwie, nazwa routa `special_file_download`, middleware'y z `downloadMiddleware`.

Gdzie `routePrefix` pobierane jest z `config/crude.php`.

---

W widokach korzystaj z partial'i:
* `@include('CrudeCRUD::special-files.download-btn', ['file' => $file])` - wyświetla ikonę z linkiem do pobrania pliku lub znak blokady gdy brakuje pliku;
* `@include('CrudeCRUD::special-files.label-with-info', ['file' => $file])` - wyświetla nazwę z danymi o pliku;
* `@include('CrudeCRUD::special-files.upload-form', ['key' => 'nazwa_pliku'])` - formularz do dodawania pliku.
Gdzie `$file` jest elementem listy z `getList()`;
* `@include('CrudeCRUD::special-files.list')` - zbiera powyższe partial'e, wyświetla kompletną listę plików, nie wymaga przekazywania żadnych danych.

---

Przykład:

Fragment `config/crude_special_files.php`:
```php
'files' => [
    'rules'
],
```

Akcja w kontrolerze administratora (nie wymaga przekazywania żadnych danych):
```php
public function uploadPage()
{
    return view('upload_page');
}
```

Widok `upload_page`, wykorzystuje partial `special-files.list`:
```php
@extends('layouts.default')

@section('content')
    @include('CrudeCRUD::special-files.list')
@endsection
```

Przed załadowaniem pliku:
![/wiki/pl/helpers/special_files/sf_1.png](/wiki/pl/helpers/special_files/sf_1.png "Przed załadowaniem pliku")

Po załadowaniu pliku:
![/wiki/pl/helpers/special_files/sf_2.png](/wiki/pl/helpers/special_files/sf_2.png "Po załadowaniu pliku")

Pobieranie pliku na stronie gościa:
```php
<a href="{{ route('special_file_download', 'rules') }}">
    Pobierz regulamin
</a>
```
