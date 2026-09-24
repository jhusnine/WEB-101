document.getElementById("btnsearchstudent").addEventListener
(
	"click", 
	function(){
		let name = document.getElementById("txtstudentlistsearch").value;
		fetch("../controllers/student_controller.php?name="+name, {
			method: "GET"
		})
		.then(response => response.json())
		.then(result => {
			let content = "";
			result.forEach(student => {
				content = content +  "<tr>";
				content = content + "<td>" + student.Id + "</td>";
				content = content + "<td>" + student.Lastname + "</td>";
				content = content + "<td>" + student.Firstname + "</td>";
				content = content + "<td>" + student.Middlename + "</td>";
				content = content +  "</tr>";
			});
			document.getElementById("studentTable").innerHTML = content;
		});
	}
);