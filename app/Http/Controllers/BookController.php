<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all();
        return response()->json($book,200);
        // return view('admin.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $book = new Book();
        $book->name= $request->name;
        $book->category = $request->category;
        $success=$book->save();

        if (!$success) {
            return response()->json('Eror',500);
            
        }
      
        return response()->json('success',201);
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        if (is_null($book)) {
            return response()->json('not found',404);
        }
        return response()->json($book,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!is_null($request['name'])) {
            $book->name=$request['name'];
        }
        if (!is_null($request['category'])) {
            $book->category=$request['category'];
        }
        $success=$book->save();
        if (!$success) {
            return response()->json('eror',500);
        }

        return response()->json('success',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if (is_null($book)) {
            return response()->json('Not Found',404);
        }
        $success= $book->delete();
        if (!$success) {
            return response()->json('error deleting',500);
        }
        return response()->json('data telah di hapus',200);
    }
}
