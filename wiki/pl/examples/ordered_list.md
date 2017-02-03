Ordered list
===

Part of create books table migration

```php
public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->increments('id');
        $table->string('tile');
        $table->integer('order');
        $table->timestamps();
    });
}
```

Book Model

```php
namespace App\Models;

class Book extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'title',
        // you don't need order attribute name here
        // if you add it in here,
        // correct the attributes of the columns and forms in crude class
    ];
}
```

List of books crude class

```php
use Auth;

class BooksList extends \Crude implements \CRUDInterface, \CrudeOrderInterface
{
    use \CrudeFromModelTrait;

    public function __construct()
    {
        $this->setModel(new \App\Models\Book);

        $this->prepareCrudeSetup();

        $this->crudeSetup
            ->setTitle('List of books')
            ->setTrans([
                'id' => 'Id',
                'title' => 'Title',
                'order' => '#'
            ])
            ->setColumnFormat([
                'title' => 'longtext'
            ])

            ->setColumn(['id', 'title'])
            // you don't need this,
            // ['id', 'title'] is default column value (dependent of model $fillable),
            // but if you use this method,
            // make sure that value does not contain order attribute name

            ->setAddAndEditForm(['title'])
            // you don't need this,
            // ['title'] is default form value (dependent of model $fillable),
            // but if you use this method,
            // make sure that value does not contain order attribute name

            ->useOrderedList('title', 'order')
            // after that the table contains three columns
            // ['order', 'id', 'title']
            // 'order' is default attribute name,
            // so use just useOrderedList('title')
            ;

        // new item will store in first place
        $this->storeInFirstPlace();

        // example of using blocking options method
        if (Auth:user()->cannotOrderListOfBooks())
            $this->crudeSetup->lockOrderOption();
    }

    // you do not need to override this method in such a way,
    // but if you do, make sure that the models of the collection has the required attributes
    public function prepareQuery()
    {
        return $this->model->select('id', 'title', 'order');
        // default method returns $this->model,
        // it will be the same result in this example
    }
}
```

so, after refactoring

```php
namespace App\Models;

class Book extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = ['title'];
}
```

```php
use Auth;

class BooksList extends \Crude implements \CRUDInterface, \CrudeOrderInterface
{
    use \CrudeFromModelTrait;

    public function __construct()
    {
        $this->setModel(new \App\Models\Book);

        $this->prepareCrudeSetup();

        $this->crudeSetup
            ->setTitle('List of books')
            ->setTrans(['id' => 'Id', 'title' => 'Title', 'order' => '#'])
            ->setColumnFormat('title', 'longtext');

        $this->storeInFirstPlace();

        if (! Auth:user()->cannotOrderListOfBooks())
            $this->crudeSetup->useOrderedList('title');
    }
}
```

Result:

List

![/wiki/en/examples/ordered_list/1.png](/wiki/en/examples/ordered_list/1.png "List")

Order modal

![/wiki/en/examples/ordered_list/2.png](/wiki/en/examples/ordered_list/2.png "Order modal")

Change order

![/wiki/en/examples/ordered_list/3.png](/wiki/en/examples/ordered_list/3.png "Change order")

After save

![/wiki/en/examples/ordered_list/4.png](/wiki/en/examples/ordered_list/4.png "After save")

While adding a new item

![/wiki/en/examples/ordered_list/5.png](/wiki/en/examples/ordered_list/5.png "While adding a new item")

After store

![/wiki/en/examples/ordered_list/6.png](/wiki/en/examples/ordered_list/6.png "After store")
