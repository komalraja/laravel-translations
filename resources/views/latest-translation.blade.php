<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Email Template</title>
</head>
<body>

<div class="container mt-4">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Phrase to translate</h4>
      <p class="card-text"> English Text : <b>{{ $emailData['latestEnglishText'] }} </b></p>
      <p class="card-text">Corresponding Japanese Translation: <b>{{ $emailData['latestJapaneseText'] }} </b></p>
    
      <p class="card-text">To Approve the phrase:  <a href="{{ $emailData['approveLink'] }}">Click here</a></p>
      <p class="card-text">To Edit the phrase: <a href="{{ $emailData['editLink'] }}">Click here</a></p>
    </div>
  </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
