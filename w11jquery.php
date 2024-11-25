<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jQuery</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        /* Our very own custom class to hide the element*/
        .hidden{
            display: none;
        }

        /* Added a coment to the main section */
        body{
            background-color: rgb(6, 69, 133);
            color: gray;
        }


        /* Added style to the whole jquery section */
        label{
            display: block;
            padding: 15px;
        }

        textarea,select,button{
            padding: 10px;
            border: 1px solid black;
        }

        button{
            display: block;
            background-color: cadetblue;
            border-radius: 8px;
        }

        #divFollowUp{
            padding: 18px;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <!-- this is a good place for a menu section -->
        </nav>
    </header>

    <!-- added a main section -->
     <main>
        <h1>Please fill out this form to help improve our game</h1>

        <form id="frmSurvey" method="post" action="w11jquery.php">
            <label for="selSatisfaction">How satisfied are you with the game?</label>
            <select name="selSatisfaction" id="selSatisfaction" required>
                <option value="">Please select an option</option>
                <option value="very_satisfied">Very Satisfied</option>
                <option value="somewhat_satisfied">Somewhat Satisfied</option>
                <option value="satisfied">Satisfied</option>
                <option value="neutral">Neutral</option>
                <option value="dissatisfied">Dissatisfied</option>
                <option value="very_dissatisfied">Very Dissatisfied</option>
            </select>

            <!-- Add an area to add comments if they are dissastisfied -->
            <div id="divFollowUp" class="hidden">
                <label for="txtaReason">What could have gone better?</label>
                <textarea id="txtaReason" name="txtaReason" rows="4" placeholder="Let us know your concerns here..."></textarea>
            </div>

            
            <label for="txtaReason">Any additional comments that are helpful?</label>
            <textarea id="txtaComments" name="txtaReason" rows="4" placeholder="Add any extra comments here..."></textarea>
            
            <div id="divCounter">0/300 characters</div>

            <!-- Added a submit button -->
            <button type="submit">Submit</button>
        </form>
     </main>

     <script>
        // wait to run our jQuery until our page loads
        $(document).ready(function(){
            // show the follow up area if dissatisfied or very dissatisfied
            $('#selSatisfaction').change(function(){
               if ($(this).val() == "dissatisfied" || $(this).val() == "very_dissatisfied"){
                    $('#divFollowUp').slideDown();
               }else{
                    $('#divFollowUp').slideUp();
               }
            });

            // count the characters in the comments text area
            $('#txtaComments').on('input', function(){
                var maxLength = 300;
                var charCount = $(this).val().length;
                // display how many characters allowed using string
                $('#divCounter').text(`${charCount}/${maxLength} characters`);

                // change the color of the text
                if (charCount > maxLength){
                    $('#divCounter').css('color', 'red');
                } else {
                    $('#divCounter').css('color', 'black');
                }
            });
        });
     </script>
</body>
</html>