<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/blog-post.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<title>INSTALLATION</title>
</head>
<body>
	<div class="container well">
		<h1>Installation</h1>
		<form action="create_blog.php" method="POST" class="form">
			<p><label>Choose a username: <input type="text" name="user" required="TRUE" autocomplete="false" class="checkbox"></label></p>
			<p><label>Choose a password: <input type="password" name="pass" required="true" autocomplete="false" class="checkbox"></label></p>
			<p><label>Choose a name for your blog: <input type="text" name="blogname" required="true" autocomplete="false" class="checkbox"></label></p>
			<p><label>Choose a language for your blog: <select name="lang"><option value="en">English</option><option value="es">Español</option></select></label></p>
			<p><label>
				<select name="date_format">
					<option value="d-m-y">dd-mm-yyyy</option>
					<option value="d-m">dd-mm</option>
					<option value="m-d-y">mm-dd-yyyy</option>
					<option value="m-d">mm-dd</option>
					<option value="d/m/y">dd/mm/yyyy</option>
					<option value="d/m">dd/mm</option>
					<option value="m/d/y">mm/dd/yyyy</option>
					<option value="m/d">mm/dd</option>
				</select>
			</label></p>
			<p><label>Choose your local timezone:
				<select name="shift">
					<option value="-12">(UTC-12:00) International Date Line West</option>
					<option value="-11">(UTC-11:00) Coordianted Universal Time-11</option>
					<option value="-10">(UTC-10:00) Aleutian Islands</option>
					<option value="-10-">(UTC-10:00) Hawaii</option>
					<option value="-9.5">(UTC-09:30) Marquesas Islands</option>
					<option value="-9">(UTC-09:00) Alaska</option>
					<option value="-9">(UTC-09:00) Coordianted Universal Time-09</option>
					<option value="-8">(UTC-08:00) Baja California</option>
					<option value="-8">(UTC-08:00) Coordiantead Universal Time-08</option>
					<option value="-8">(UTC-08:00) Pacific Time (US &amp; Canada)</option>
					<option value="-7">(UTC-07:00) Arizona</option>
					<option value="-7">(UTC-07:00) Chihuahua, La Paz, Mazatlan</option>
					<option value="-7">(UTC-07:00) Mountain Time (US &amp; Canada)</option>
					<option value="-6">(UTC-06:00) Central America</option>
					<option value="-6">(UTC-06:00) Central Time (US &amp; Canada)</option>
					<option value="-6">(UTC-06:00) Easter Islands</option>
					<option value="-6">(UTC-06:00) Guadalajara, Mexico City, Monterrey</option>
					<option value="-6">(UTC-06:00) Saskatchewan</option>
					<option value="-5">(UTC-05:00) Bogota, Lima, Quito, Rio Branco</option>
					<option value="-5">(UTC-05:00) Chetumal</option>
					<option value="-5">(UTC-05:00) Eastern Timte (US &amp; Canada)</option>
					<option value="-5">(UTC-05:00) Haiti</option>
					<option value="-5">(UTC-05:00) Havana</option>
					<option value="-5">(UTC-05:00) Indiana (East)</option>
					<option value="-4">(UTC-04:00) Asuncion</option>
					<option value="-4">(UTC-04:00) Atlantic Time (Canada)</option>
					<option value="-4">(UTC-04:00) Caracas</option>
					<option value="-4">(UTC-04:00) Cuiaba</option>
					<option value="-4">(UTC-04:00) Georgetown, La Paz, Manaus, San Juan</option>
					<option value="-4">(UTC-04:00) Santiago</option>
					<option value="-4">(UTC-04:00) Turks and Caicos</option>
					<option value="-3.5">(UTC-03:30) Newfoundland</option>
					<option value="-3">(UTC-03:00) Arguaina</option>
					<option value="-3">(UTC-03:00) Brasilia</option>
					<option value="-3">(UTC-03:00) Cayenne, Fortaleza</option>
					<option value="-3">(UTC-03:00) Buenos Aires</option>
					<option value="-3">(UTC-03:00) Greenland</option>
					<option value="-3">(UTC-03:00) Montevideo</option>
					<option value="-3">(UTC-03:00) Saint Pierre and Miquelon</option>
					<option value="-3">(UTC-03:00) Salvador</option>
					<option value="-2">(UTC-02:00) Coordinated Universal Time-02</option>
					<option value="-1">(UTC-01:00) Azores</option>
					<option value="-1">(UTC-01:00) Cabo Verde Is.</option>
					<option value="0" selected>(UTC) Coordinated Universal Time</option>
					<option value="0">(UTC+00:00) Casablanca</option>
					<option value="0">(UTC+00:00) Dublin, Edinburgh, Lisbon, London</option>
					<option value="0">(UTC+00:00) Monrovia, Reykjavik</option>
					<option value="+1">(UTC+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
					<option value="+1">(UTC+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
					<option value="+1">(UTC+01:00) Brussels, Copenhagen, Madrid, Paris</option>
					<option value="+1">(UTC+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
					<option value="+1">(UTC+01:00) West Central Africa</option>
					<option value="+1">(UTC+01:00) Windhoek</option>
					<option value="+2">(UTC+02:00) Amman</option>
					<option value="+2">(UTC+02:00) Atehns, Bucharest</option>
					<option value="+2">(UTC+02:00) Beirut</option>
					<option value="+2">(UTC+02:00) Cairo</option>
					<option value="+2">(UTC+02:00) Chisinau</option>
					<option value="+2">(UTC+02:00) Damascus</option>
					<option value="+2">(UTC+02:00) Gaza, Hebron</option>
					<option value="+2">(UTC+02:00) Harare, Pretoria</option>
					<option value="+2">(UTC+02:00) Helsinki, Hyiv, Riga, Sofia, Tallinn, Vilnius</option>
					<option value="+2">(UTC+02:00) Jerusalem</option>
					<option value="+2">(UTC+02:00) Kaliningrad</option>
					<option value="+2">(UTC+02:00) Tripoli</option>
					<option value="+3">(UTC+03:00) Baghdad</option>
					<option value="+3">(UTC+03:00) Istanbul</option>
					<option value="+3">(UTC+03:00) Kuwait, Riyadh</option>
					<option value="+3">(UTC+03:00) Minsk</option>
					<option value="+3">(UTC+03:00) Moscow, St. Petersburg, Volgograd</option>
					<option value="+3">(UTC+03:00) Nairobi</option>
					<option value="+3.5">(UTC+03:30) Tehran</option>
					<option value="+4">(UTC+04:00) Abu Dhabi, Muscat</option>
					<option value="+4">(UTC+04:00) Astrakhan, Ulynovsk</option>
					<option value="+4">(UTC+04:00) Baku</option>
					<option value="+4">(UTC+04:00) Izhevsk, Samara</option>
					<option value="+4">(UTC+04:00) Port Louis</option>
					<option value="+4">(UTC+04:00) Tbilisi</option>
					<option value="+4">(UTC+04:00) Yerevan</option>
					<option value="+4.5">(UTC+04:30) Kabul</option>
					<option value="+5">(UTC+05:00) Ashgabat, Tashkent</option>
					<option value="+5">(UTC+05:00) Ekaterinburg</option>
					<option value="+5">(UTC+05:00) Islamabad, Karachi</option>
					<option value="+5.5">(UTC+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
					<option value="+5.5">(UTC+05:30) Sri Jayawardenepura</option>
					<option value="+5.75">(UTC+05:45) Kathmandu</option>
					<option value="+6">(UTC+06:00) Astana</option>
					<option value="+6">(UTC+06:00) Dhaka</option>
					<option value="+6">(UTC+06:00) Omsk</option>
					<option value="+6.5">(UTC+06:30) Yangon (Rangoon)</option>
					<option value="+7">(UTC+07:00) Bangkok, Hanoi, Jakarta</option>
					<option value="+7">(UTC+07:00) Barnaul, Gorno-Altaysk</option>
					<option value="+7">(UTC+07:00) Hovd</option>
					<option value="+7">(UTC+07:00) Krasnoyarsk</option>
					<option value="+7">(UTC+07:00) Novosibirsk</option>
					<option value="+7">(UTC+07:00) Tomsk</option>
					<option value="+8">(UTC+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
					<option value="+8">(UTC+08:00) Irkutsk</option>
					<option value="+8">(UTC+08:00) Kuala Lumpur, Singapore</option>
					<option value="+8">(UTC+08:00) Perth</option>
					<option value="+8">(UTC+08:00) Taipei</option>
					<option value="+8">(UTC+08:00) Ulaanbaatar</option>
					<option value="+8.5">(UTC+08:30) Pyongyang</option>
					<option value="+8.75">(UTC+08:45) Eucla</option>
					<option value="+9">(UTC+09:00) Chita</option>
					<option value="+9">(UTC+09:00) Osaka, Sapporo, Tokyo</option>
					<option value="+9">(UTC+09:00) Seoul</option>
					<option value="+9">(UTC+09:00) Yakutsk</option>
					<option value="+9.5">(UTC+09:30) Adelaide</option>
					<option value="+9.5">(UTC+09:30) Darwin</option>
					<option value="+10">(UTC+10:00) Brisbane</option>
					<option value="+10">(UTC+10:00) Canberra, Melbourne, Sydney</option>
					<option value="+10">(UTC+10:00) Guam, Port Moresby</option>
					<option value="+10">(UTC+10:00) Hobart</option>
					<option value="+10">(UTC+10:00) Vladivostok</option>
					<option value="+10.5">(UTC+10:30) Lord Howe Island</option>
					<option value="+11">(UTC+11:00) Bougainville Island</option>
					<option value="+11">(UTC+11:00) Chokurdakh</option>
					<option value="+11">(UTC+11:00) Magadan</option>
					<option value="+11">(UTC+11:00) Norfolk Island</option>
					<option value="+11">(UTC+11:00) Sakhalin</option>
					<option value="+11">(UTC+11:00) Solomon Is., New Caledonia</option>
					<option value="+12">(UTC+12:00) Anadyr, Petropavlovsk-Kamchatsky</option>
					<option value="+12">(UTC+12:00) Auckland, Wellington</option>
					<option value="+12">(UTC+12:00) Coordinated Universal Time+12</option>
					<option value="+12">(UTC+12:00) Fiji</option>
					<option value="+12.75">(UTC+12:45) Chatham Islands</option>
					<option value="+13">(UTC+13:00) Nuku'alofa</option>
					<option value="+13">(UTC+13:00) Samoa</option>
					<option value="+14">(UTC+14:00) Kiritimati Island</option>
				</select>

			</label></p>
			<input type="submit" value="INSTALL"></form>
		</form>
	</div>
</body>
</html>
