    <?php
    	session_start();
    	$id = $_GET['id'];
     
    	$books = simplexml_load_file('files/books.xml');
     
    	//we're are going to create iterator to assign to each book
    	$index = 0;
    	$i = 0;
     
    	foreach($books->book as $book){
    		if($book->id == $id){
    			$index = $i;
    			break;
    		}
    		$i++;
    	}
     
    	unset($books->book[$index]);
    	file_put_contents('files/books.xml', $books->asXML());
     
    	$_SESSION['message'] = 'Member deleted successfully';
    	header('location: index.php');
     
    ?>