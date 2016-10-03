Traits
===

Użyj trait’a `CrudeFromModelTrait` aby przyśpieszyć budowanie nowej listy, znajdują się w nim wszystkie metody (każdego interfacu). Jeżeli będziesz chciał coś poprawić, po prostu nadpiszesz odpowiednie funkcje.

Przykład:

```php
    <?php

    namespace App\Crude;

    class Book extends \Crude
        implements \CrudeCRUDInterface  // z tym interfacem na liście pojawią się
                                        // opcje dodawania, edycji i usuwania
    {
        use \CrudeFromModelTrait;       // tu znajdują się wszystkie metody

        public function __construct()
        {
            $this->setModel(new App\Models\Book); // dodanie odpowiedniego modelu
            $this->prepareCrudeSetup();           // przygotowanie domyślnych ustawień
        }
    }
```

Tak przygotowana lista jest gotowa do wyświetlenia.
