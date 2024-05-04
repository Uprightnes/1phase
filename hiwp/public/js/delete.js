// Wait for the document to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    // Function to delete table content
    function deleteTableContent() {
        // Ask for confirmation before deleting
        var confirmation = confirm("Are you sure you want to delete all entities in the table?");
        if (confirmation) {
            // Select the table body
            var tableBody = document.querySelector("#staffTable tbody");
            // Remove all rows from the table body
            tableBody.innerHTML = "";
        }
    }

    // Call the deleteTableContent function when the delete button is clicked
    var deleteAllBtn = document.querySelector(".delete-all-btn");
    deleteAllBtn.addEventListener("click", deleteTableContent);
});