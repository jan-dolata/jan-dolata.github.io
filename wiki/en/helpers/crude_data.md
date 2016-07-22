Data
===

Class `CrudeData`

Flush and set data in session

Methods:

- `public static function put(array $data)`
- `public static function get($attr = null)`

Example:

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

