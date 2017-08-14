<?php
// If it's going to need the database, then it's
// probably smart to require it before we start.
require_once('database.php');
require_once('database_object.php');
require_once('functions.php');

class Writer {

	public  function header($team, $user) 
		{ ?>

     <div class="well">
	<div class="title_header" id="test">Create Assessment</div>
	<div class="title_header"> Unit:  <? echo $team->team_name ?></div>
	<div class="title_header">Unit Leader : <? echo $user->full_name(); ?> </div>
	<p></p>
	<div class="reg_text">Mission: <? echo $team->team_mission_statement  ?></div>
	<p></p>
</div>
	 <?   } 
	 
	 public  function goals($team, $user)
	 { 
	 	$goals = goal::find_by_sql("select * from goals where inactive='0'");
	 	?>
			<div class="well">
			<div class="page_head"></div>
		 	<form name="myForm" id="myForm" action="assessment_saved.php?team_id=<? echo $team_id ?>&user_id=<? echo $user_id ?>" method="post">
 	  			<a href="initial_index.php?team_id=<? echo $team->team_id ?>&user_id=<? echo $user->user_id ?>" >Return to Team Home</a><p>
 	  			<div class="column_header">College Goal</div>
 	  			 <?
 		foreach($goals as $goal) 
    		{ ?>
    			  <input type="radio" name="goals_id" id="goal" value="<? echo $goal->goals_id; ?>" required> <? echo $goal->goals_goal; ?><br>
    		<?php 
 		}
    		?>
 	  			<br>
	 	 <?   } 
	 	 
	 	public  function slo($team) {
	 		
	 		if($team->team_type) { ?>
	 		<div class="column_header">Strategic Initiative</div>
	 			<?php 
	 			$strategic_initiatives = strategic_initiative::find_by_sql("select * from strategic_initiative where team_id=$team->team_id");
	 			foreach($strategic_initiatives as $strategic_initiative) { ?>
	 				<input type="radio" name="strategic_initiative_id" id="strategic_initiative_id" value="<? echo $strategic_initiative->strategic_initiative_id; ?>" required><? echo " " . $strategic_initiative->strategic_initiative_text; ?><br>
	 				<?php 
	 					 		}
	 			
	 		} else { ?>
	 		<div class="column_header">Student Learning Outcome</div>
	 			<?php 	
		 		$slos = slo::find_by_sql("select * from slo where team_id=$team->team_id");
		 		foreach($slos as $slo) { ?>
			 		<input type="radio" name="slo_id" id="slo_id" value="<? echo $slo->slo_id; ?>" ><? echo " " . $slo->slo_text; ?><br>
			 		<?php 
		 		}
	 		}
	 		
	 	}
	 	
	 	public  function method_outcome () {
	 		?>
	 		<br>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
					  <label for="usr"><div class="column_header">Method of Outcome Assessment</div></label>
					   <textarea class="form-control" rows="3" id="outcome" name="outcome_assessment" ></textarea>
			</div>
		</div>
		<?php 
	 	}
	 	
	 	public  function performance_measure () {
	 		?>
	 		<div class="col-md-6">
	 			<div class="form-group">
	 						  <label for="usr"><div class="column_header">Performance Measure</div></label>
	 						   <textarea class="form-control" rows="3" id="outcome" name="performance_measure" ></textarea>
	 				</div>
	 			</div>
	 			<?php 
	 		 	}
	 	
	 
	 
	 
}// end of class

?>