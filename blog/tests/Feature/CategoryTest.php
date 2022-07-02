<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_add_Category_page_render(){
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $this->get('/category/tambah')->assertSeeText('Tambah Category');
        
    }
    public function test_post_add_Category(){
        $this->withoutExceptionHandling();
        $category =  Category::factory()->create();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $this->post('/category/tambah', $category->toArray())->assertRedirect('/login');
    }

    public function test_delete_not_found(){
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $this->get('/category/hapus/{id}')->assertRedirect('/login');
    } 

}
