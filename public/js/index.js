function searchByDepartment() {
    var department = document.getElementById("selectDepartment").value;
    
    // Perform AJAX request to the server
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("searchResults").innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "views/search.php?department=" + department, true);
    xhr.send();
}
