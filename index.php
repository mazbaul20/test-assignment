<?php
class Book {
    private $title;
    private $availableCopies;

       public function __construct($title, $availableCopies) {
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

       public function getTitle() {
        return $this->title;
    }

        public function getAvailableCopies() {
        return $this->availableCopies;
    }

        public function borrowBook() {
        if ($this->availableCopies > 0) {
            $this->availableCopies--;
            echo "Book '{$this->title}' borrowed successfully. Available copies: {$this->availableCopies}\n";
        } else {
            echo "Sorry, '{$this->title}' is not available right now.\n";
        }
    }

        public function returnBook() {
        $this->availableCopies++;
        echo "Book '{$this->title}' returned successfully. Available copies: {$this->availableCopies}\n";
    }
}

class Member {
        private $name;

        public function __construct($name) {
        $this->name = $name;
    }

        public function getName() {
        return $this->name;
    }
    public function borrowBook(Book $book) {
        echo "{$this->name} is trying to borrow '{$book->getTitle()}'...\n";
        $book->borrowBook();
    }
        public function returnBook(Book $book) {
        echo "{$this->name} is returning '{$book->getTitle()}'...\n";
        $book->returnBook();
    }
}
$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);
$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");
$member1->borrowBook($book1);
$member2->borrowBook($book2);
echo "-----------------------------\n";
echo "Available Copies:\n";
echo "Book 1 - '{$book1->getTitle()}': {$book1->getAvailableCopies()}\n";
echo "Book 2 - '{$book2->getTitle()}': {$book2->getAvailableCopies()}\n";

