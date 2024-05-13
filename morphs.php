In Laravel, morphs is a convenient method used when defining polymorphic relationships in database migrations.
Polymorphic relationships allow a model (referred to as the "morphable" model) to belong to multiple other models on a single association.
The morphs method, specifically used in migration files, helps set up the necessary columns for polymorphic relationships.

Schema::create('prices', function (Blueprint $table)
{
    $table->id();
    $table->morphs('priceable'); // This adds two columns: priceable_id and priceable_type
    $table->string('type');
    $table->decimal('amount', 10, 2);
    $table->timestamps();
});

class Price extends Model
{
    protected $fillable = ['type', 'amount'];

    public function priceable()
    {
        return $this->morphTo();
    }
}

class Product extends Model
{
    public function prices()
    {
        return $this->morphMany(Price::class, 'priceable');
    }
}
class Order extends Model
{
    public function prices()
    {
        return $this->morphMany(Price::class, 'priceable');
    }
}

priceable column would be 
App\Models\Product
App\Models\Order
App\Models\Cart
App\Models\Subscription
App\Models\Item
