Opcja układania kolejności
===

Po włączeniu opcji, na górnym pasku pojawi się dodatkowa ikona, pozwalająca wyświetlić modal, umożliwiający poukładanie listy metodą przeciągnij i upuść.
Po dodaniu lub usunięciu modelu, licznik kolejności będzie przeliczany ponownie.

### Użycie

Na początku dodaj interface `CrudeOrderInterface` i trait `CrudeFromModelTrait`.

Tabela w bazie musi posiadać numeryczną kolumnę do przechowywania kolejności.

W konstruktorze klasy dodaj poniższy wpis (koniecznie po wywołaniu `$this->prepareCrudeSetup()`)

```php
$this->crudeSetup->useOrderedList('nazwa atrybutu etykiety', 'nazwa atrybutu kolejności', 'nazwa atrybutu id');
```

Domyślne wartości:
* `id` dla nazwy atrybutu id,
* `order` dla nazwy atrybutu kolejności,
* `name` dla nazwy atrybutu etykiety.

Dodatkowo `useOrderedList()` doda kolumnę `order` na pierwszym miejscu widoku listy.

Istnieje możliwość zablokowania opcji prze wywołanie `$this->crudeSetup->lockOrderOption()` (ale tylko po wywołaniu `useOrderedList()`), lub przez ustawienie uprawnienia w metodzie `permissionOrder($options)` (zobacz #uprawnienia).

Nowy model może być dodawany jako pierwszy w kolejności, w konstruktorze dodaj `$this->storeInFirstPlace();`.
