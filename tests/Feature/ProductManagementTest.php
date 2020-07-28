<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Product;

class ProductManagementTest extends TestCase
{   
    use RefreshDatabase;
    /** @test */
    public function a_product_can_be_create()
    {
    
        $this->withoutExceptionHandling();
        
        $response = $this->post('/products',[

           'sku'                =>'sku01',
           'slug'               =>'sku01',
           'description_short'  =>'safdasfasfa',
           'description_large'  =>'safasfasfasfasfasfasfasf',
           'data_interest'      =>'asfasfasfasfasfas',
           'spec'               =>'afasfasfasf',
           'brand_id'           =>1,
           'pattern_id'         =>2,
           'category_id'        =>1,
           'colour_id'          =>1,
           'date_start'         =>2000,
           'date_finish'         =>2010,
           'quantity'           =>4,
           'price'              =>100,
           'discount_rate'      =>10,
           'active'             =>'si',
           'visit'              =>100,
           'count_sale'         =>10,
           'slider'             =>'si',
        ]);

       $response->assertOk();
       $this->assertCount(1, Product::all());

       $product = Product::first();

       $this->assertEquals($product->sku ,'sku01');
       $this->assertEquals($product->slug ,'sku01');
       $this->assertEquals($product->description_short ,'safdasfasfa');
       $this->assertEquals($product->description_large ,'safasfasfasfasfasfasfasf');
       $this->assertEquals($product->data_interest ,'asfasfasfasfasfas');
       $this->assertEquals($product->spec ,'afasfasfasf');
       $this->assertEquals($product->brand_id ,'1');
       $this->assertEquals($product->pattern_id ,'1');
       $this->assertEquals($product->category_id,'1');
       $this->assertequals($product->colour_id,'1');
       $this->assertEquals($product->date_start ,'2000');
       $this->assertEquals($product->date_finish ,'2010');
       $this->assertEquals($product->quantity,'4');
       $this->assertEquals($product->price ,'100');
       $this->assertEquals($product->discount_rate ,'10');
       $this->assertEquals($product->active,'si');
       $this->assertEquals($product->visit ,'100');
       $this->assertEquals($product->count_sales ,'10');
       $this->assertEquals($product->slider ,'si');







      
           

    }
   
}
