document.getElementById("quizForm").addEventListener("submit", function(e){
        e.preventDefault();
        
        var questions = document.querySelectorAll(".quiz-card");
        var score = 0;
        
        for(var i = 0; i < questions.length; i++){
            var q = questions[i];
            var selected = q.querySelector("input[type='radio']:checked");
            var result = q.querySelector(".result");
            
            if (!selected) {
                result.textContent = "⚠️ No answer";
                result.className = "result wrong";
                continue;
            }
            if (selected.className === "T") {
            score++;
                result.textContent = "✔ Correct";
                result.className = "result correct";
            } else {
                result.textContent = "✘ Wrong";
                result.className = "result wrong";
            }
        }
        
        document.getElementById("score").textContent = "Your score: "+ score +"/" + questions.length;
        
        var retryContainer = document.getElementById("retry");
        var btn = document.createElement("a");
        btn.href  = "Quiz.html";
        btn.textContent = "Try Again";
        btn.className="btn";
        
        retryContainer.appendChild(btn);
    });