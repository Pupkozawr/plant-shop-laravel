<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model {
    use HasFactory;
    protected $fillable = ['name','description','price','category_id','image_url','stock','is_active'];
    protected function casts(): array { return ['price'=>'decimal:2','is_active'=>'boolean']; }
    public function category(){ return $this->belongsTo(Category::class); }
    public function reviews(){ return $this->hasMany(Review::class); }
    public function orderItems(){ return $this->hasMany(OrderItem::class); }
    public function getRatingAttribute(): float { return (float) ($this->reviews()->avg('rating') ?? 0); }
}
