Autocomplete
===

App\Models\Book

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title'
    ];
}

```

Crude class construct

```php
$this->crudeSetup->setTypes([
    'book_id' => 'autocomplete'
]);
```

Crude class method

```php
public function autocompleteBookId($term)
{
    return (new \App\Models\Book)
        ->where('title', 'like', '%' . $term . '%')
        ->select(
            'id as id',
            'title as label'
        )
        ->take(10)
        ->get();
}

public function labelAttrName($id)
{
    $label = (new \App\Models\Book)
        ->where('id', $id)
        ->value('title');

    return empty($label) ? '' : $label;
}
```
