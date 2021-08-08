<?php

namespace App\Services;

class BookService extends BaseService{
    

    /**
     * Business logic to process and store books
     *
     * @param array $data
     * @return array
     */
    public function storeBook(array $data)
    {
        return; 
    }

    /**
     * Business logic to process and update book
     *
     * @param integer $bookId
     * @param array $data
     * @return bool
     */
    public function updateBook(int $bookId, array $data)
    {
        return;
    }

    /**
     * Business Logic to delete book
     *
     * @param integer $bookId
     * @return bool
     */
    public function deleteBook(int $bookId)
    {
        return;
    }

    /**
     * Get all books in the system
     *
     * @return array
     */
    public function getBooks()
    {
        return;
    }

    /**
     * Get a single book
     *
     * @param integer $bookId
     * @return array
     */
    public function getBook(int $bookId)
    {
        return;
    }
}