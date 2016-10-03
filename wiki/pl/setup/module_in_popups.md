Formularze w modalach
===

Domyślnie formularze pojawiają się nad listą, ale można to zmienić na wyskakujące okienko.
W konstruktorze dodaj

```php
$this->crudeSetup->usePopup()
// lub
$this->crudeSetup->setModuleInPopup(true)
```
