$(document).ready(function(){
	$(".spanblock").click(function(){
		$(".nav").css("margin-left","0px");
		$(this).hide();
	});
	$(".navbackopt").click(function(){
		$(".nav").css("margin-left","-290px");
		$(".spanblock").show();
	});
});
function home()
{
    window.open("logon_admin.php","_self");
}

function mng_us()
{
    window.open("usermanag.php","_self");
}
           
function mng_adm()
{
    window.open("adminmnag.php","_self");
}
           
function mng_pay()
{
    window.open("payment.php","_self");
}
           
function mng_stud()
{
    window.open("studmanage.php","_self");
}

function about()
{
    window.open("about.php","_self");
}
function contact()
{
    window.open("contact.php","_self");
}

function compmnag()
{
    window.open("complaintmanagement.php","_self");
}

function timetable()
{
    window.open("timetablemanag.php","_self");
}


/*for logon.php and above employee related pages*/
function emphome()
{
    window.open("logon.php","_self");
}

function pay()
{
    window.open("paystatus.php","_self");
}
           
function attend()
{
    window.open("attandance.php","_self");
}

function reports()
{
    window.open("reports.php","_self");
}
           
function exam()
{
    window.open("examporter.php","_self");
}

function timetb()
{
    window.open("timetable_view.php","_self");
}

           
function comp()
{
    window.open("complaint.php","_self");
}
