Custom input
===

In crude class construct add `setType` with name of new input

```php
$this->crudeSetup->setTypes([
    'attr' => 'newInputName'
]);
```

In view add template,

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

and js method to get value from field (if you want to use method from jquery, underscore or moment)

```
<script type="text/javascript">
    function getFromNewInputNameInput ($el) {
        return $el.val();
    };
</script>
```

Example:

Part of crude class constuct

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

Template

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
        return $el.val(); // will return array with ids of selected statuses
    };
</script>
```
