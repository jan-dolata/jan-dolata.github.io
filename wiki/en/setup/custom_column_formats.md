Custom column format
===

In crude class construct add `setColumnFormat` with name of new column format

```php
$this->crudeSetup->setColumnFormat('attr', 'newColumnFormatName');
```

In view add template,

```html
<script type="text/template" id="crude_newColumnFormatNameColumnFormatTemplate">
    <%- model.get(attr) %>
</script>
```

Example:

```php
$this->crudeSetup->setColumnFormat('cost', 'price');
```

Template with `numberFormat` method from underscore string (in package)

```html
<script type="text/template" id="crude_priceColumnFormatTemplate">
    <%- s.numberFormat(model.get(attr), 2, ".", ",");  %> $
</script>
```
