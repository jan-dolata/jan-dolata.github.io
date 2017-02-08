Upgrade 1.0.* => 1.1.*
===

Moduł mapy:

Marker nie jest wymagany. Pod mapą pojawia się przycisk do usuwania markera.

Zmiana nazw kolumn:

1.0.*
```php
lat
lng
address
```

1.1.*
```php
map_lat
map_lng
// opcjonalne
map_address
map_province
map_locality
map_postal_code
```

Poprawki w config:

1.0.*
```php
/**
 * Map defaults
 * @var array
 */
'mapDefaults' => [
    'lat' => 52.03,
    'lng' => 19.27
],
```

1.1.*
```php
/**
 * Map center
 * @var array
 */
'mapCenter' => [
    'lat' => 52.03,
    'lng' => 19.27
],
```

---

Metody usunięte z `CrudeSetup` w 1.1.* :
* `setDropzoneTrans`,
* `getDropzoneTrans`,

Metody usunięte z `WithThumbnailTrait` w 1.1.* :
* `setThumbnailWidth`,
* `setThumbnailHeight`

---

CrudeData nie czyści sesji i został przebudowany.

Metody 1.0.*
- `public static function put(array $data)`
- `public static function get($attr = null)`

Metody 1.1.*
- `public static function put($crudeName, $attr, $value = null)`
- `public static function get($crudeName, $attr = null)`

Dodano metodę pod `Crude`:
- `public function getCrudeData($attr = null)`

---

Metoda `prepareCrudeSetup` w `Crude` zwraca `$this->crudeSetup` zamiast `$this`;
