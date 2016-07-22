Traits
===

Use `CrudeFromModelTrait` to speed up creating new list.

Example:
```php
    <?php

    namespace App\Crude;

    class Book extends \Crude implements \CrudeCRUDInterface
    {
        use \CrudeFromModelTrait;

        public function __construct()
        {
            $this->setModel(new App\Models\Book);
            $this->prepareCrudeSetup();
        }
    }
```
