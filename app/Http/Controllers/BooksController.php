<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Book;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class BooksController extends BaseController
{
   

   public function index(){
   		
   		$books = Book::all();
   		return response()->json($books);
   }


   public function getBook($id){

   			$book = Book::find($id);
   			if($book != null){
   				return response()->json($book);
			}else{
				return response()->json('Book Not Found!');
			}
   		
/*   		try{
   			$book = Book::find($id);
   			return response()->json($book);
   		}catch(ModelNotFoundException $EX){
   			return response()->json([
   				'error' => [
   				'message' => 'Book not found'
   				]
   			], 404);
   		}*/
   	
   }

   public function createBook(Request $request){
   		
   		$book = Book::create($request->all());
   		return response()->json($book);
   }

   public function updateBook(Request $request, $id){

   		$book = Book::find($id);
   		$book->title = $request->input('title');
   		$book->auther = $request->input('author');
   		$book->isbn = $request->input('isbn');
   		$book->save();

   		return response()->json($book);
   }



   public function deleteBook($id){

   		$book = Book::find($id);
   		$book->delete();
   		return response()->json("Deleted!");
   }





}
