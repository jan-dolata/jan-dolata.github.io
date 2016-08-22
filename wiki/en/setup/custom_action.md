Custom action
===

In crude class construct add `setCustomActions`

```php
$this->crudeSetup->setCustomActions([
    'actionName' => [
        'title' => 'Name of Action' // html button title
    ],
    'secondActionName' => [
        'title' => 'Name of Second Action'
    ]
]);
```

or

```php
$this->crudeSetup->setCustomActions('actionName', ['title' => 'Name of Action']);
```

In crude class add method

```php
public function actionNameCustomAction($model)
{
    // action code
    return 'success message';
}
```

and second method to define access (default method return true)

```php
public function actionNameCustomActionPermission($model)
{
    return true;
}
```

In view add action button template

```html
<script type="text/template" id="actionNameCustomActionButtonTemplate">
    Name of Action
</script>
```

For simple button with link (`actionNameCustomAction` is not required)

```php
$this->crudeSetup->setCustomActions('actionName', [
    'title' => 'Name of linked page',
    'type' => 'link',
    'url' => route('route_name'),
    'attr' => 'id'
]);
```

### Example:

Crude class construct

```php
$this->crudeSetup->setCustomActions([
    'lock' => [ 'title' => 'lock' ]
]);
```

Crude class method

```php
public function lockCustomAction($model)
{
    $this->updateById($model->id, ['id'=> $model->id, 'is_locked' => 1]);
    return trans('message.lock_success');
}

public function lockCustomActionPermission($model)
{
    return Auth::user()->isAdmin() && ! $model->is_locked;
}
```

Template

```
<script type="text/template" id="lockCustomActionButtonTemplate">
    <i class="fa fa-lg fa-lock"></i> Lock
</script>
```
