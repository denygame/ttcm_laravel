<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;
use App\Book;
use Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        //view share cho header
        view()->composer('header',function($view){
            $cate = Category::all();
            $new_book = Book::where('stt_delete', 0)->where('new',1)->orderBy('id','desc')->limit(4)->get();
            $super_discount = Book::where('stt_delete',0)->orderBy('discount','desc')->limit(4)->get();
            $sold_book = Book::where('stt_delete',0)->orderBy('sold','desc')->limit(4)->get();

            $shopping_cart = Cart::content();

            $view->with(compact('cate','new_book','super_discount','sold_book','shopping_cart'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
