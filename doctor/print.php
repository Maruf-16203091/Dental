<!DOCTYPE html>
<html>
<head>
</style>
<style type="text/css">
    .a_hide{
      display: none !important;
    }
    
    @media print
      {     
          .no-print, .no-print *
          {
              display: none !important;
          }
          .tblh td{
              border-top:none;
          }
          .print_en{
            text-align: center;
            display: block !important;
          }
          .tbl{
            width: 70%;
          }
          table{
            width:100% !important;
          }
		  form{
			  width:70%;
		  }
      }

    </style>
	<script language="javascript">
    function printdiv(printpage)
    {
    var headstr = "<html><head><title>Prescription</title></head><body>";
    var footstr = "</body>";
    var newstr = document.all.item(printpage).innerHTML;
    var oldstr = document.body.innerHTML;
    document.body.innerHTML = newstr+footstr;
    window.print();
    document.body.innerHTML = oldstr;
    return ;
    }
  </script>

</head>
<body>

<input type="button" value="Print " onclick="printdiv('div_print');" />

</body>
</html>
