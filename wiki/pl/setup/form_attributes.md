Atrybuty formularza
===

Formularze w domyślnej postaci zawierają pola dla wszystkich atrybutów zdefiniowanych w tablicy `fillable` modelu. Aby je ustawić samemu, wykorzystaj jedną z metod:
* `setAddForm`
* `setEditForm`
* `setAddAndEditForm`

Przykład:
```
$this->crudeSetup
    ->setAddForm(['first_name', 'last_name', 'email'])
    ->setEditForm(['first_name', 'last_name']);
```
