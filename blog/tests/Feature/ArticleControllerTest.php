<?php

namespace Tests\Feature;

use App\Http\Controllers\ArticleController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
      /**
     * A basic feature test example.
     *
     * @return void
     */

   public function test_postaddArticle(){
      $this->post('/article/tambah' , [
         'title' => 'Artivicial',
         'content' => 'test 123',
         'category_id' => '1',
         'user_id' => '1',
      ])->assertRedirect('/login');
      
   }


   public function test_updateArticle_not_found()
   {
      $this->get('/article/update/{id}')->assertRedirect('/login');
   }

   public function test_postupdateArticle(){

      $this->post('/article/update' , [
         'title' => 'Artivicial',
         'content' => 'test 123',
         'category_id' => '1',
         'user_id' => '1',
      ])->assertRedirect('/login');
      
      }

      public function test_delete_Article_not_found()
      {
         
         $this->get('/article/delete/{id}')->assertRedirect('/login');
  
      }

      public function test_view_Article_not_found()
      {
         
         $this->get('/article/detail/{id}')->assertRedirect('/login');
  
      }



}
