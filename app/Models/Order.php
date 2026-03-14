<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Order extends Model {
    use HasFactory;
    protected $fillable = ['user_id','order_number','ordered_at','status','total_amount'];
    protected function casts(): array { return ['ordered_at'=>'datetime','total_amount'=>'decimal:2']; }
    public function user(){ return $this->belongsTo(User::class); }
    public function items(){ return $this->hasMany(OrderItem::class); }
}
