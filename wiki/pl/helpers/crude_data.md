Data
===

Klasa `CrudeData`

Klasa zawiera metody do przyjmowania i zwracania danych. Dane zapisywane są w sesji. Przy każdym przekazaniu nowych wartości, stare dane są czyszczone.

Metody:

- `public static function put(array $data)`
- `public static function get($attr = null)`

Przykład:

```php
CrudeData::put([
    'attr_1' => 'value_1',
    'attr_2' => 'value_2'
]);

CrudeData::get(); // => ['attr_1' => 'value_1', 'attr_2' => 'value_2']

CrudeData::get('attr_1'); // => 'value_1'

CrudeData::get('attr_3'); // => null

CrudeData::put([
    'attr_2' => 'value_2'
]);

CrudeData::get() // => ['attr_2' => 'value_2']
```
