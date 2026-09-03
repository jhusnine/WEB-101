<body>
	<link rel="stylesheet" href="style.css" type="text/css" />
	<input type="text" id="txtstudentlistsearch"/><button id="btnsearchstudent">Search</button>
	<div id="divsearch" class="divsearch">
		<div id="divstudentlistlabel">Student List</div>
		<table id="tblstudentlist" border="1">
			<thead>
			<tr>
				<th>ID</th>
				<th>Last name</th>
				<th>Given name</th>
				<th>Middle name</th>
			</tr>
			</thead>
			<tbody id="studentTable">
			</tbody>
		</table>
	</div>
</body>
<script src="script.js?v=<?= time() ?>"></script>


