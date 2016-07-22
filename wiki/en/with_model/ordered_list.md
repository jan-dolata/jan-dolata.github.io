Ordered list
===

This option allows you to manage the sequence of elements.

Above the table displays a button that opens modal, in which using drag and drop, you can set the order of items.

After store and delete model, all orders will be recalculate.

### Usage

First of all, class should implements `CrudeOrderInterface`.

All methods are in `CrudeFromModelTrait`.

The model must have a numeric attribute, to keep order.

In class `__construct` place (after `$this->prepareCrudeSetup()`)

```php
$this->crudeSetup->useOrderedList('label_attr_name', 'order_attr_name', 'id_attr_name');
```

Default values:
* `id` for id attribute name,
* `order` for order attribute name,
* `name` for label attribute name.

Also `useOrderedList()` will add `order` column in table (on first place).

You can disable the option by calling `$this->crudeSetup->lockOrderOption()` (after `useOrderedList()`), or overwrite `permissionOrder($options)` method.

Change new item place by calling `$this->storeInFirstPlace();` in class `__construct`.
