<?php

namespace App\Models\Product;

use App\Models\User\Cart;
use App\Models\User\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 *
 *
 * @property int $id
 * @property string $title
 * @property string $weight
 * @property string $amount
 * @property string $cost
 * @property string $category_id
 * @property string $date_of_delivery
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDateOfDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @property-read \App\Models\Product\Category $category
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @method static \Database\Factories\Product\ProductFactory factory($count = null, $state = [])
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Cart> $carts
 * @property-read int|null $carts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Order> $orders
 * @property-read int|null $orders_count
 * @mixin \Eloquent
 */
class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'products';
    protected $fillable = [
        'title',
        'weight',
        'amount',
        'cost',
        'category_id',
        'date_of_delivery',
        'image'
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('products')
            ->useFallbackUrl('/storage/place-holder-image.png', 'product')
            ->useFallbackPath(public_path('/storage/place-holder-image.png'), 'product');
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('product')
            ->width(70)
            ->height(70)
            ->nonOptimized();
    }


    public function getCost(): string
    {
        return $this->cost;
    }

    public function setCost(string $cost): void
    {
        $this->cost = $cost;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getWeight(): string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): void
    {
        $this->weight = $weight;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(?string $amount): void
    {
        $this->amount = $amount;
    }

    public function getCategoryId(): string
    {
        return $this->category_id;
    }

    public function setCategoryId(string $categoryId): void
    {
        $this->category_id = $categoryId;
    }

    public function getDateOfDelivery(): string
    {
        return $this->date_of_delivery;
    }

    public function setDateOfDelivery(string $dateOfDelivery): void
    {
        $this->date_of_delivery = $dateOfDelivery;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function cart():BelongsToMany
    {
        return $this->belongsToMany(Cart::class);
    }

    public function orders():BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function getOrders(): void
    {
        $this->orders;
    }
}
