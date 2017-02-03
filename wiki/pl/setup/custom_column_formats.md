Dodatkowe formatowanie kolumn
===

W konstruktorze klasy dodaj `setColumnFormat` z nazwą dla nowego szablonu z formatowaniem komórki.

```php
$this->crudeSetup->setColumnFormat('attr', 'newColumnFormatName');
```

W widoku dodaj szablon (odwołuj się do wartości modelu przez `model.get(attr)`, w `attr` znajduje się nazwa atrybuty wybranej kolumny)

```html
<script type="text/template" id="crude_newColumnFormatNameColumnFormatTemplate">
    <%- model.get(attr) %>
</script>
```

Przykład:

```php
$this->crudeSetup->setColumnFormat('cost', 'price');
```

Szablon (wykorzystano metodę `numberFormat` z biblioteki underscore string, dodatek do paczki)

```html
<script type="text/template" id="crude_priceColumnFormatTemplate">
    <%- s.numberFormat(model.get(attr), 2, ".", ",");  %> $
</script>
```
