<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $data = [
            'books' => $books
        ];
        return view('books.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:books',
            'desc' => 'required',
            'cover' => 'required|mimes:jpg,png,jpeg'
        ]);

        $data = $request->all();
        $data['image'] = $this->insertImage($request->title,$request->cover);
        Book::create($data);
        return redirect()->route('books.index')->with([
            'message' => 'Book Added Successfully',
            'alert' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $data = [
            'book' => $book
        ];
        return view('books.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $data = [
            'book' => $book
        ];
        return view('books.update',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|unique:books,id',
            'desc' => 'required',
        ]);
        $data = $request->all();
        if($request->file('cover')){
            Storage::disk('books')->delete($book->image);
            $data['image'] = $this->insertImage($request->title,$request->cover);
        }
        $book->update($data);

        return redirect()->route('books.show',$book->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Storage::disk('books')->delete($book->image);
        $book->delete();
        return redirect()->route('books.index')->with([
            'message' => 'Book Deleted...',
            'alert' => 'danger'
        ]);

    }

    private function insertImage($title,$image){
        $new_image  = $title . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/books'), $new_image);
        return $new_image;
    }
}
