<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<?php
if(isset($quiz_data)){
  ?>

<div class="table-responsive">
  <table class="table table-striped table-bordered">
    <tr>
      <th>Quiz_Id</th>
      <th>Question number</th>
      <th>Response</th>
     
    </tr>
    <?php 
    foreach($quiz_data->result() as $row)
    {
        echo '
        <tr>
        <td>'.$row->q_id.'</td>
        <td>'.$row->question.'</td>
        <td>'.$row->solution.'</td>
        
        </tr>
        ';
    }
          ?>
    
  </table>
</div>
<?php }
if(isset($question_details)){
  echo $question_details;
}
?>
</body>
</html>