<?php
if (isset($_GET["count"]) && isset($_GET["prodBenefits"])) {
  $count = $_GET["count"];
  $prodBenefits = $_GET["prodBenefits"];

  if ($count === $prodBenefits) {
    echo "true";
  } else {
    echo "false";
  }
}
?>
