<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\Http\Requests\AddBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    public static function getName($id)
    {
    	return Book::where('id',$id)->select('name')->first();
    }

    public static function getCateName($id){
    	$book=Book::where('id',$id)->first();
    	return Category::where('id',$book->cate_id)->select('name')->first();
    }

    public static function getIdMax()
    {
    	return Book::max('id') + 1;
    }

    public function insertBook(AddBookRequest $request)
    {
        $imgBefore = $request->file('fileImgBefore')->getClientOriginalName();
        $request->file('fileImgBefore')->move('upload/products/',$imgBefore);
        $imgAfter = $request->file('fileImgAfter')->getClientOriginalName();
        $request->file('fileImgAfter')->move('upload/products/',$imgAfter);

        $book = new Book;
        $book->name=$request->name;
        $book->alias=changeTitle($request->name);
        $book->price=$request->price;
        $book->discount=$request->discount;
        $book->image_before=$imgBefore;
        $book->image_after=$imgAfter;
        $book->author=$request->author;
        $book->date_publish=$request->date_publish;
        $book->com_publish=$request->com_publish;
        $book->description=$request->description;
        $book->cate_id=$request->slcate;

        $book->save();

        return redirect()->route('managebook')->with(['success'=>'Thêm sách mới thành công']);
    }

    public function updateBook(UpdateBookRequest $request)
    {
        $book = Book::find($request->idbook);

        if(!empty($request->file('fileImgBefore'))){
            $imgBefore = $request->file('fileImgBefore')->getClientOriginalName();
            $request->file('fileImgBefore')->move('upload/products/',$imgBefore);
            $book->image_before=$imgBefore;
        }

        if(!empty($request->file('fileImgAfter'))){
            $imgAfter = $request->file('fileImgAfter')->getClientOriginalName();
            $request->file('fileImgAfter')->move('upload/products/',$imgAfter);
            $book->image_after=$imgAfter;
        }

        

        $book->name=$request->name;
        $book->alias=changeTitle($request->name);
        $book->price=$request->price;
        $book->discount=$request->discount;
        $book->author=$request->author;
        $book->date_publish=$request->date_publish;
        $book->com_publish=$request->com_publish;
        $book->description=$request->description;
        $book->cate_id=$request->slcate;

        $book->save();

        return redirect()->route('managebook')->with(['success'=>'Cập nhật sách [id: '.$request->idbook.' ; name: '.$request->name.'] mới thành công']);
    }
}
