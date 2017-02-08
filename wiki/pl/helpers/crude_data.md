Data
===

Klasa `CrudeData`

Klasa zawiera metody do przyjmowania i zwracania danych. Dane zapisywane są w sesji.

Metody:

- `public static function put($crudeName, $attr, $value = null)`
- `public static function get($crudeName, $attr = null)`

Przykład:

```php
CrudeData::put('Lista', 'attr', 'value');

CrudeData::put('Lista', [
    'attr_1' => 'value_1',
    'attr_2' => 'value_2'
]);

CrudeData::get('Lista'); // => ['attr' => 'value', 'attr_1' => 'value_1', 'attr_2' => 'value_2']

CrudeData::get('Lista', 'attr_1'); // => 'value_1'

CrudeData::get('attr_3'); // => null
```

---

W klasie `Crude` znajdziesz pomocniczą metodę `getCrudeData($attr = null)`.

```php
class Lista extends \Crude implements \CrudeListInterface {

    use \CrudeFromModelTrait;

    public function __construct()
    {
        ...

        $this->getCrudeData('attr'); // => 'value'

        ...
    }
}
```
