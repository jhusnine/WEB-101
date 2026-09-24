document.getElementById("btnlogin").addEventListener
(
	"click", 
	function(){
		const uname = document.getElementById("txtusername").value;
		const upass = document.getElementById("txtpassword").value;
		fetch("../controllers/student_controller.php?uname1="+encodeURIComponent(uname)+"&upass1="+encodeURIComponent(upass), {
			method: "GET"
		})
		.then(response => response.text())
		.then(result => {
			if (result.trim() == "1")
			{
				window.location.replace("home.php");
			} else {
				document.getElementById("message").innerHTML = "Wrong username and password!";
			}
		});
	}
);