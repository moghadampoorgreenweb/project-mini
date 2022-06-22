<?php

function alertMe($error = false, $title, $type)
{
    if ($error == false) {
        return "";
    }
    if (empty($title)) {
        $title = "عمليات موفقيت آميز بود";
    }
    if (empty($type)) {
        $type = 'success';
    }
    return "
   <div class=\"alert alert-{$type} alert-dismissible fade show\" role=\"alert\">
  {$title}
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>
";
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validation_requre($item)
{
    $counter_error = 0;
    foreach ($item as $item) {
        if (empty($item)) {
            $counter_error++;
        }
    }
    return $counter_error == 0;
}


function function_alert($message) {

    // Display the alert box
    echo "alert('$message');";
}







