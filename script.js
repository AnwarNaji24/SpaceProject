// Add an event listener to the quiz form to handle submission
document.getElementById("quizForm").addEventListener("submit", function(e){
    // Prevent the default form submission (page reload)
    e.preventDefault();
    
    // Select all quiz question cards
    var questions = document.querySelectorAll(".quiz-card");
    // Initialize the score counter
    var score = 0;
    
    // Loop through each question card
    for(var i = 0; i < questions.length; i++){
        var q = questions[i];
        // Get the selected radio button for this question
        var selected = q.querySelector("input[type='radio']:checked");
        // Get the container to display result for this question
        var result = q.querySelector(".result");
        
        // If no answer is selected
        if (!selected) {
            result.textContent = "⚠️ No answer";  // Show warning message
            result.className = "result wrong";     // Apply "wrong" styling
            continue;                               // Skip to next question
        }

        // Check if the selected answer is correct
        if (selected.className === "T") {
            score++;                                // Increase score
            result.textContent = "✔ Correct";      // Show correct message
            result.className = "result correct";   // Apply "correct" styling
        } else {
            result.textContent = "✘ Wrong";        // Show wrong message
            result.className = "result wrong";     // Apply "wrong" styling
        }
    }
    
    // Display total score at the top of the quiz
    document.getElementById("score").textContent = "Your score: "+ score +"/" + questions.length;
    
    // Create a "Try Again" button dynamically
    var retryContainer = document.getElementById("retry");
    var btn = document.createElement("a");   // Create a new anchor element
    btn.href  = "Quiz.html";                 // Link it back to the quiz page
    btn.textContent = "Try Again";           // Button text
    btn.className="btn";                     // Apply button styling
    
    // Add the "Try Again" button to the page
    retryContainer.appendChild(btn);
});