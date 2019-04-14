<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;
Use App\Models\Author;
Use App\Models\Genre;
Use App\Models\Publisher;
Use App\Models\Book;


class UserController extends Controller
{
    //
    public function getHome(){
    	$data['list'] = DB::table('books')
            ->join('author_book', 'author_book.book_id', '=', 'books.id')
            ->join('book_genre', 'book_genre.book_id', '=', 'books.id')
            ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
            ->join('genres', 'genres.id', '=', 'book_genre.genre_id')
            ->join('authors', 'authors.id', '=', 'author_book.author_id')
            ->select('books.*', 'authors.name', 'genres.genreType', 'publishers.publisherName')
            ->get();
    	// return view('user.home');
    	return view('user.home', $data);

    }
}
