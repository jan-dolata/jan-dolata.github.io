Dodatkowe akcje
===

Po prawej stronie, przy każdym elementcie listy, znajdziesz akcje. Domyślnie jest tu przycisk z ołówkiem i koszem dla edycji i usuwania. Dodatkowe przyciski dodajesz przy użyciu `setCustomActions` w konstruktorze.

```php
$this->crudeSetup->setCustomActions([
    'actionName' => [
        'title' => 'Name of Action' // html button title
    ],
    'secondActionName' => [
        'title' => 'Name of Second Action'
    ]
]);
// lub
$this->crudeSetup->setCustomActions('actionName', ['title' => 'Name of Action']);
```

W klasie dodaj nową metodę, wywoływaną po wybraniu nowej akcji na liście.

```php
public function actionNameCustomAction($model)
{
    // action code
    return 'success message';
}
```

Możesz również dodać metodę definiującą uprawnienia.

```php
public function actionNameCustomActionPermission($model)
{
    return true;
}
```

W widoku dodaj szablon z zawartością przycisku

```html
<script type="text/template" id="actionNameCustomActionButtonTemplate">
    Name of Action
</script>
```

Możesz również, dodawać przyciski będące prostymi linkami (bez dodawania  metody `actionNameCustomAction`)

```php
$this->crudeSetup->setCustomActions('actionName', [
    'title' => 'Name of linked page',
    'type' => 'link',
    'url' => route('route_name'),
    'attr' => 'id'
]);
```

### Przykład:

Konstruktor klasy crude

```php
$this->crudeSetup->setCustomActions([
    'lock' => [ 'title' => 'lock' ]
]);
```

Nowa metody klasy crude

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

Szablon w widoku

```
<script type="text/template" id="lockCustomActionButtonTemplate">
    <i class="fa fa-lg fa-lock"></i> Lock
</script>
```
