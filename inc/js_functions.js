
/*function prepareEventHandlers() {
	document.getElementById("myForm").onsubmit = function () {
	        var str = '';
	        var elem = document.getElementById('myForm').elements;
	        for(var i = 0; i < elem.length; i++) {
	            if (elem[i].value=="") {
	            	alert("Please select " + elem[i].name);
	            	return false;
	            }
	        } 
	        if (myForm.slo_id) {
				var myOption = -1;
				for (i=myForm.slo_id.length-1; i > -1; i--) {
					if (myForm.slo_id[i].checked) {
					myOption = i; i = -1;
					}
				}
				if (myOption == -1) {
					alert("Please select a Student Learning Outcome");
					return false;
					} 
				} else {
					var myOption2 = -1;
					for (i=myForm.goals_id.length-1; i > -1; i--) {
						if (myForm.goals_id[i].checked) {
						myOption2 = i; i = -1;
						}
					}
					if (myOption2 == -1) {
						alert("Please select a goal");
						return false;
						}
					}
    }
 }*/
 window.onload = function () {
	prepareEventHandlers();
}
     
     function check_submit() 
     {
        if (confirm("The Assessment has been saved but not submitted. To submit, click Cancel and use the Submit Assessment button. To continue without submitting, click OK") == false) 
       	 {
        		event.preventDefault();
    		} 
     	}
     	
     function initial_submit(assessment_id) 
     {
        if (confirm("Once this assessment is submitted it can no longer be edited.  Would you like to submit?") == false) 
       	 {
        		event.preventDefault();
    		} 
    		else {
    			window.location.href="assessment_submit.php?id=" + assessment_id;
    		}
     	}
     
     
     function final_submit(assessment_id, user_id) 
     {
        if (confirm("Once this assessment is submitted it can no longer be edited.  Would you like to submit?") == false) 
       	 {
        		event.preventDefault();
    		} 
    		else {
    			window.location.href="assessment_complete.php?id=" + assessment_id + "&user_id=" + user_id;
    		}
     	}


 function pending_reassessment() 
     {
        if (confirm("There is a 2014 re-assessment pending for this team.  Please contact Amanda West before proceeding.") == false) 
       	 {
        		event.preventDefault();
    		} 
    		else {
    			window.location.href="assessment_submit.php?id=" + assess;
    		}
     	}

  function deactivate_confirm(slo) 
     {
        if (confirm("Are you sure you want to deactivate this SLO?  It will no longer be available for use") == false) 
       	 {
        		event.preventDefault();
    		} 
    			else
    		 {
    			window.location.href="deactivate_slo.php?slo_id=" + slo;
    		}
     	}
  
   function deactivate_user(user_id, team_type) 
     {
        if (confirm("Are you sure you want to deactivate this user?  They will no longer be able to access the system") == false) 
       	 {
        		event.preventDefault();
    		} 
    			else
    		 {
    			window.location.href="deactivate_user.php?user_id=" + user_id + "&team_type=" + team_type;
    		}
     	}
     	
     	 function deactivate_goal(goal_id) 
     {
        if (confirm("Are you sure you want to deactivate this goal?  It will no longer be available for use") == false) 
       	 {
        		event.preventDefault();
    		} 
    			else
    		 {
    			window.location.href="deactivate_goal.php?goal_id=" + goal_id;
    		}
     	}
   
     function final_delete(assess) 
     {
        if (confirm("Are you sure you want to delete this assessment?  This action cannot be undone!") == false) 
       	 {
        		event.preventDefault();
    		} 
    		else {
    			window.location.href="delete_assessment.php?id=" + assess;
    		}
     	}