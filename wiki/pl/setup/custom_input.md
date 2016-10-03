Dodatkowe pola formularzy
===

Do formularzy można dodawać również nowe typy pól. Aby to zrobić, dodaj w `setType` nazwę nowego pola.

```php
$this->crudeSetup->setTypes([
    'attr' => 'newInputName'
]);
```

W widoku dodaj szablon (zwróć uwagę na id szablonu).

```html
<script type="text/template" id="crude_newInputNameInputTemplate">
    <input
        type="custom"
        class="input form-control"
        data-attr="<%- attr %>"
        placeholder="<%- setup.getAttrName(attr) %>: newInputName"
        data-method="getFromNewInputNameInput"
        value="<%- model[attr] %>">
</script>
```


Po dodaniu `type=”custom”` w i klasy `input`, wartości z pola będą pobierane przez twoją js metodę, której nazwę przekazujesz w `data-method`.
Śmiało korzystaj z metod z bibliotek jquery, underscore i moment.

```
<script type="text/javascript">
    function getFromNewInputNameInput ($el) {
        return $el.val();
    };
</script>
```

Przykład:

Fragment konstruktora w klasie crude

```php
$this->crudeSetup
    ->setTypes([
        'status' => 'multiselect'
    ])
    ->setSelectOptions(
        'status',
        [
            ['id' => 'new', 'label' => 'New'],
            ['id' => 'public', 'label' => 'Public']
        ]
    );
```

Szablon (Template)

```
<script type="text/template" id="crude_multiselectInputTemplate">
    <select
        multiple
        type="custom"
        class="input form-control"
        data-attr="<%- attr %>"
        placeholder="<%- setup.getAttrName(attr) %>: multi select"
        data-method="getFromMultiselectInput">

        <% for (var i in setup.get('selectOptions')[attr]) { %>
            <% var option = setup.get('selectOptions')[attr][i] %>
            <option value="<%- option.id %>" <%- model[attr] == option.id ? 'selected' : '' %>>
                <%- option.label %>
            </option>
        <% } %>

    </select>
</script>

<script type="text/javascript">
    function getFromMultiselectInput ($el) {
        return $el.val(); // Zwraca tablicę id’ków wybranych pozycji
    };
</script>
```
