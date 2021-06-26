<?php
require("Data.php");
$data = new Data;
$states = $data->getStates()['states'];
$state_id = $_GET['state_id'] ?? null;
if($state_id){
    echo '<option value="">Select District</option>';
    $districts = $data->getDistrictByStateId($state_id)['districts'];
    foreach($districts as $dist){
        echo '<option value='.$dist['district_id'].'>' . $dist['district_name'] . '</option>';
    }
}

// Get by Pin

$pin = $_GET['pin'] ?? null;
$date = $_GET['date'] ?? date('d-m-Y');
if($pin && $date){
    $slots = $data->getSlotsByPinRange($pin, $date)['centers'];
    if(count($slots) == 0)
    {
      echo "<p class='text-danger' style='margin: 10px auto'>No Slots Available</p>";
      die();
    }
    echo "<div class='card-box container justify-content-center'>";
    foreach($slots as $key=>$s){
    echo"<div class='card table-hover bg-light mb-3' style='width: 18rem;'>";
    echo '<div class="card-header"><span class="text-bold">' . $s['sessions'][0]['date'] . '</span></div>';
    echo  "<div class='card-body'>
      <h5 class='card-title'>$s[name]</h5>
          <h6 class='card-subtitle mb-2 text-muted'>$s[address]</h6>";
    echo '<p class="badge badge-danger"> Age: '.$s['sessions'][0]['min_age_limit'].'+</p>';
    echo '<p class="badge badge-success">'.$s['sessions'][0]['vaccine'].'</p>';
    echo '<p class="badge badge-info">'.$s['fee_type'].'</p>';
    echo '<p class="card-text">Available Capacity: ' . $s['sessions'][0]['available_capacity'] . '</p>';
      echo '<span class="badge badge-primary">Dose1: ' . $s['sessions'][0]['available_capacity_dose1'] . '</span>&nbsp;';
      echo '<span class="badge badge-primary">Dose2: ' . $s['sessions'][0]['available_capacity_dose2'] . '</span><br>';   
      echo "<!-- <a href='#' class='btn btn-success'>Book Now</a> -->
        </div>
    </div>";
    }
  echo "</div>";
  }


// Get by District

  $dist_id = $_GET['dist'] ?? null;
  $date = $_GET['date'] ?? date('d-m-Y');

  if($dist_id && $date){
    $slots = $data->getSlotsByDistRange($dist_id, $date)['centers'];
    if(count($slots) == 0)
    {
      echo "<p class='text-danger' style='margin: 10px auto'>No Slots Available</p>";
      die();
    }
    echo "<div class='card-box container justify-content-center'>";
    foreach($slots as $key=>$s){
    echo"<div class='card table-hover bg-light mb-3' style='width: 18rem;'>";
    echo '<div class="card-header">' . $s['sessions'][0]['date'] . '</div>';
    echo  "<div class='card-body'>
      <h5 class='card-title'>$s[name]</h5>
          <h6 class='card-subtitle mb-2 text-muted'>$s[address]</h6>";
    echo '<p class="badge badge-danger"> Age: '.$s['sessions'][0]['min_age_limit'].'+</p>';
    echo '<p class="badge badge-success">'.$s['sessions'][0]['vaccine'].'</p>';
    echo '<p class="badge badge-info">'.$s['fee_type'].'</p>';
    echo '<p class="card-text">Available Capacity: ' . $s['sessions'][0]['available_capacity'] . '</p>';
      echo '<span class="badge badge-primary">Dose1: ' . $s['sessions'][0]['available_capacity_dose1'] . '</span>&nbsp;';
      echo '<span class="badge badge-primary">Dose2: ' . $s['sessions'][0]['available_capacity_dose2'] . '</span><br>';   
      echo "<!-- <a href='#' class='btn btn-success'>Book Now</a> -->
        </div>
    </div>";
    }
  echo "</div>";
}


    

    // foreach($slots as $slot => $s){
    //     echo "Name: ".$s['name'].'<br>';
    //     echo "Address: $s[address]".'<br>';
    //     echo "From: $s[from] To: $s[to]<br>";
    //     echo "FEE Type: $s[fee_type]<br>";
    //     echo 'Date: ' . $s['sessions'][0]['date'].'<br>';
    //     echo 'Available Capacity: ' . $s['sessions'][0]['available_capacity'].'<br>';
    //     echo 'Age: ' . $s['sessions'][0]['min_age_limit'].'<br>';
    //     echo 'Vaccine: ' . $s['sessions'][0]['vaccine'].'<br>';
    //     foreach($s['sessions'][0]['slots'] as $slot_timings){
    //     echo 'Slot Timings: ' . $slot_timings.'<br>';
    //     }
    //     echo 'Available capacity dose1: ' . $s['sessions'][0]['available_capacity_dose1'].'<br>';
    //     echo 'Available capacity dose2: ' . $s['sessions'][0]['available_capacity_dose2'].'<br>';
    //     echo '<br>';
    // }

  //   echo "<table class='table table-bordered table-hover'>
  //   <thead class='thead-dark'>
  //   <tr>
  //     <th scope=col>#</th>
  //     <th scope=col>Center Name</th>
  //     <th scope=col>Address</th>
  //     <th scope=col>Timing</th>
  //     <th scope=col>Fee Type</th>
  //     <th scope=col>Date</th>
  //     <th scope=col>Age</th>
  //     <th scope=col>Vaccine</th>
  //     <th scope=col>Available Capacity</th>
  //     <th scope=col>Dose1 Cap.</th>
  //     <th scope=col>Dose1 Cap.</th>
  //   </tr>
  // </thead>";
  // echo "<tbody>";
  // foreach($slots as $key=>$s){
  //   echo"<tr>";
  //     echo '<th scope=row>'.($key+1).'</th>';
  //     echo 
  //     "<td>$s[name]</td>
  //     <td>$s[address]</td>
  //     <td>$s[from] To: $s[to]</td>
  //     <td>$s[fee_type]</td>";

  //   echo '<td>'.$s['sessions'][0]['date'].'</td>';
  //   echo '<td>'.$s['sessions'][0]['min_age_limit'].'</td>';
  //   echo '<td>'.$s['sessions'][0]['vaccine'].'</td>';
  //   echo '<td>'.$s['sessions'][0]['available_capacity'].'</td>';
  //   echo '<td>'.$s['sessions'][0]['available_capacity_dose1'].'</td>';
  //   echo '<td>'.$s['sessions'][0]['available_capacity_dose2'].'</td>';
    
  //   echo "</tr>";
  // }
  // echo"</tbody>
  // </table>";
?>