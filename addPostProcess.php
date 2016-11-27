<?php

$input = $_POST["desc"];
echo $input;
?>

<script type="text/javascript">/*
  for checking breaklines;
  var input = "<?= $input; ?>";
  var enteredText = input.val();
  alert(enteredText);
  var numberOfLineBreaks = (enteredText.match(/\n/g)||[]).length;
  var characterCount = enteredText.length + numberOfLineBreaks;
  */
</script>
