<?php
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['News', 'Coding Backend','Coding Frontend', 'Server', 'Systems', 'IT Security'];
        
        foreach($categories as $category){
            
            $newCategory= new Category();
            $newCategory->name = $category;
            $newCategory->slug = Str::slug($category);
            $newCategory->save();
        }
    }
}
