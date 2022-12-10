<?php
require "Db_config.php";
$brachDisplayquery = db_select("SELECT * FROM inquiry ORDER BY id DESC  ",'inquiry','SELECT');
//echo gettype($brachDisplayquery);

IF( gettype($brachDisplayquery) == 'string'){
    header('Location: index.html');
}
$emparray = array();
while($row =mysqli_fetch_assoc($brachDisplayquery))
{
    $emparray[] = $row;
}
//print_r($emparray);
$jsondata= json_encode($emparray);
//PRINT_R($jsondata);
//die();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta charset="utf-8">
  <title>Laxmi Narrow Fabrics - Other products</title>
  <meta content="" name="description">
  <meta content="" name="author">
  <meta content="" name="keywords">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
  <!-- favicon -->
  <link href="img/favicon-theone.png" rel="icon" sizes="32x32" type="image/png">
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- font themify CSS -->
<!--  <link rel="stylesheet" href="css/themify-icons.css">-->

<!--  <link href="font-awesome/css/all.css" rel="stylesheet">-->
  <!-- revolution slider css -->

    <link href="css/dis/kendo.common.min.css" rel="stylesheet" />
    <!-- <link href="http://kendo.cdn.telerik.com/2022.2.510/styles/kendo.common.min.css" rel="stylesheet" /> -->

    <link href=" css/dis/font.css" rel="stylesheet" />
    <link href="css/dis/styleguide.css" rel="stylesheet" />


    <link href="css/dis/casepoint.comfortable.css" rel="stylesheet" />
    <link href="css/dis/kendo.Yellow.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.5.0/themes/prism.min.css">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2022.3.1109/styles/kendo.default-v2.min.css"/>

 <body>
<!-- preloader -->
    <div class="bg-preloader"></div>
    <div id="preloadbar"></div>
    <div class="preloader">
      <div class="mainpreloader">
        <span></span>
      </div>
    </div>

<div class="grid-wrapper" style="height: 400px">
    <div id="nestedGrid" class="k-grid-with-pager"></div>
</div>




<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<!--<script src="https://kendo.cdn.telerik.com/2022.3.1109/js/kendo.all.min.js"></script>-->

<!--  <script src="http://kendo.cdn.telerik.com/2022.2.510/js/kendo.all.min.js"></script>-->

    <script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.4.0/clipboard.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.5.0/prism.min.js"></script>
<script src="css/dis/kendo.all.min.js"></script>

    <script src="css/dis/custom.js"></script>

     <script type="text/javascript">

         $( document ).ready(function() {

             //Kendo Hierarchy grid
             var element = $("#nestedGrid").kendoGrid({
                 dataSource: {
                     type: "json",
                     transport: {
                         read: {
                             url: 'http://localhost/laxminarrowfabrics/URL.php',
                             dataType: 'json',
                             type:'GET'
                         }
                     }

                 },
                 height: 100,
                 sortable: false,

                // detailInit: detailInit,
                 dataBound: function () {
                     this.expandRow(this.tbody.find("tr.k-master-row").first());
                 },
                 columns: [

                     {
                         field: "name",
                         title: " Name",
                         width: "100px"
                     },
                     {
                         field: "email",
                         title: " Email",
                         width: "200px"
                     },
                     {
                         field: "detail",
                         title: "Inquiry",
                         width: "350px"
                     }

                 ]
             });


         });

     </script>

  </body>
</html>