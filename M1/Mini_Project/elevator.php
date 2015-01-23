<?php 
/* 
Inputs-
	elevator floor
	elevator direction
	person floor
	person direction

Output
	yes/no can pick person up
		if no
			wrong direction
			passed floor
	

ed= elevator direction
ef= elevator floor
pd= person direction
pf= person floor


______________Tests___________________
ed-   | u|d|d|u|u|d|u|d|u|d|u|d|
ef-   | 5|5|5|5|4|4|4|4|4|4|4|4|
pd-   | d|u|d|u|u|d|u|d|u|d|d|u|
pf-   | 4|4|4|4|5|5|5|5|5|5|5|5|
ouput-


--------expected output---------
- yes
- no, wrong direction
- no, passed floor
*/

$el_dir = 'down'; 	//'up' or 'down'
$el_floor = 5; 	// 1-10

$p_dir = 'down'; 	// 'up' or 'down'
$p_floor = 4;		 


if($el_dir != $p_dir) {
	echo 'no, wrong direction';
} else {
	if ($el_dir == 'up') {
		if($el_floor <= $p_floor) {
			echo 'person picked up';
		} else{
			echo 'no, passed floor';
		}
	}
	if ($el_dir == 'down') {
		if($el_floor >= $p_floor){
			echo 'person picked up [dn]';
		} else {
			echo 'no, passed floor [dn]';
		}
	}
}


//_________________DOESNT WORK AND TOO COMPICATED___________________
// if ($el_dir == 'up' && $p_dir == 'up') {
// 	if($el_floor <= $p_floor) {
// 		echo 'person picked up';
// 	} else{
// 		echo 'person not picked up, passed floor';
// 			}
// } else if ($el_dir== 'down' && $p_dir ='down' ) {
// 	if($el_floor >= $p_floor){
// 		echo 'person picked up [dn]';
// 	} else {
// 		echo 'no, wrong direction [dn]';
// 	}
// }



//_________________DOESNT WORK AND TOO COMPLICATED______________________
// if ($el_dir == 'down' && $p_dir = 'down') {
// 		if ($el_floor >= $p_floor) {
// 			echo 'person picked up';
// 		} else {
// 			echo 'person not picked up, passed floor';
// 		}
// } else {
// 	echo 'person not picked up, wrong direction';
// }

// if ($el_dir != $p_dir){
// 	echo 'person not picked up, wrong direction';
// }