    <?php
    	session_start();
    	if(isset($_POST['edit'])){
    		$books = simplexml_load_file('files/books.xml');
    		foreach($books->book as $book){
    			if($book->id == $_POST['id']){
    				$book->title = $_POST['title'];
    				$book->author = $_POST['author'];
    				$book->year = $_POST['year'];
                    $book->price = $_POST['price'];
    				break;
    			}
    		}
     
    		file_put_contents('files/books.xml', $books->asXML());
    		$_SESSION['message'] = 'Member updated successfully';
    		header('location: index.php');
    	}
    	else{
    		$_SESSION['message'] = 'Select member to edit first';
    		header('location: index.php');
    	}
     
    ?>