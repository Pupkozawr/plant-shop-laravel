<?php
namespace Database\Seeders;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder {
    public function run(): void {
        User::create(['name'=>'Администратор','email'=>'admin@plants.local','password'=>'password','role'=>'admin']);
        User::create(['name'=>'Покупатель','email'=>'buyer@plants.local','password'=>'password','role'=>'customer']);
        $indoor = Category::create(['name'=>'Комнатные растения','description'=>'Растения для дома']);
        $succ = Category::create(['name'=>'Суккуленты','description'=>'Неприхотливые растения','parent_id'=>$indoor->id]);
        $garden = Category::create(['name'=>'Садовые растения','description'=>'Растения для участка']);
        Product::insert([
            ['name'=>'Монстера Deliciosa','description'=>'Эффектное тропическое растение для интерьера.','price'=>2490,'category_id'=>$indoor->id,'image_url'=>'https://images.unsplash.com/photo-1520412099551-62b6bafeb5bb','stock'=>15,'is_active'=>true,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Алоэ вера','description'=>'Полезный суккулент для дома и офиса.','price'=>890,'category_id'=>$succ->id,'image_url'=>'https://images.unsplash.com/photo-1459156212016-c812468e2115','stock'=>20,'is_active'=>true,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Лаванда','description'=>'Ароматное садовое растение.','price'=>650,'category_id'=>$garden->id,'image_url'=>'https://images.unsplash.com/photo-1468327768560-75b778cbb551','stock'=>30,'is_active'=>true,'created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
