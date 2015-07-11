<?php include 'head.php'; ?>
    <link href="bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<title>Pick Time</title>
</head>

<body>

<?php include('fixed-nav.php'); ?>

<div class="container">
    <form action="" class="form-horizontal"  role="form">
        <fieldset>
            <legend>Book a Facility</legend>
            <label class="control-label form_datetime" for="inputDate">DateTime Picking</label>
            <div class="input-group date form_datetime form-group-lg" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                <input class="form-control col-md-6" type="text" id="inputDate" name="inputDate" value="" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
				<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
            </div>
			<br>
			<label class="control-label form_datetime"" for="facilities" name="facilities">Facility</label>
			<div id="facilities" style="padding-left:0" >
				<select class="form-control input-lg" id="facility">
				  <option value="facility_1">Facility 1</option>
				  <option value="facility_2" selected>Facility 2</option>
				  <option value="facility_3">Facility 3</option>
				  <option value="facility_4">Facility 4</option>
				  <option value="facility_5">Facility 5</option>
				</select>
			</div>
			<br>
			<button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </fieldset>
    </form>
</div>

<script type="text/javascript" src="js/jquery.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="../js/locales/bootstrap-datetimepicker.de.js" charset="UTF-8"></script>-->

<script type="text/javascript">
	var today = new Date();
    $('.form_datetime').datetimepicker({
        language:  'en',
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
		weekStart: 1,
		startDate: today,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
		pickerPosition: "bottom-left",
		minuteStep: 60,
		linkField: "mirror_field",
        linkFormat: "yyyy-mm-dd hh:ii"

    });
	
</script>

</body>
</html>
