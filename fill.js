function fetchBookDetails() {
    var isbn = document.getElementById('isbn').value;
    
    // Only make the request if ISBN is not empty
    if (isbn.length > 0) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'getBookDetails.php?isbn=' + isbn, true);
        xhr.onload = function() {
            if (xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);
                if (data) {
                    document.getElementById('bookName').value = data.book_title;
                    document.getElementById('authorName').value = data.author_name;
                    document.getElementById('quantity').value = data.quantity;
                    document.getElementById('isFictional').value = data.is_fiction;
                    document.getElementById('isFictional').disabled = false;
                } else {
                    alert('No book found for the given ISBN.');
                }
            }
        };
        xhr.send();
    } else {
        // Clear the fields if ISBN is empty
        document.getElementById('bookName').value = '';
        document.getElementById('authorName').value = '';
        document.getElementById('quantity').value = '';
        document.getElementById('isFictional').value = '';
        document.getElementById('isFictional').disabled = true;
    }
}