<?php 
  $hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

  ];
 
  $choices = $_GET;

  if(empty($choices)) {
    $datas = $hotels;
  } else {
    
    $filteredData = [];
    if(isset($choices['parking'])) {
      $selectedParking = ($choices['parking'] === 'true');

      foreach($hotels as $hotel) {
        if($hotel['parking'] === $selectedParking) {
          $filteredData [] = $hotel;
        }
      }
    } else {
      $filteredData = $hotels;
    }

    $datas = [];
    if($choices['vote'] !== '') {
      foreach($filteredData as $data) {
        if($data['vote'] >= (int)$choices['vote'])
        $datas[] = $data;
      }
    } else {
      $datas = $filteredData;
    }
  }
?>
  

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Hotel</title>
</head>
<body>
  <div class="container py-4">
    <h1 class="text-center">HOTEL</h1>
    <form  class="my-4" action="./index.php" method="GET">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="parking" value="false" id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1" >
          no parking
        </label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="parking" value="true" id="flexRadioDefault2" >
        <label class="form-check-label" for="flexRadioDefault2">
          with parking
        </label>
      </div>
      <div class="form-check form-check-inline">
        <div class="d-flex align-items-center">
          <label for="exampleFormControlInput1" class="form-label me-2">Vote</label>
          <input type="number" name="vote" class="form-control" id="exampleFormControlInput1" placeholder="number">
        </div>
      </div>
      <div class="form-check form-check-inline">
        <button class="btn btn-primary" type="submit">Search</button>
      </div>
      <div class="form-check form-check-inline">
        <button class="btn btn-warning" type="reset">Reset</button>
      </div>
    </form>


    
    <?php if(!empty($datas)): ?> 
      <table class="table table-striped border border-1 mt-3">
        <thead>
          <tr>
            <?php foreach($hotels[0] as $key => $value) : ?>
            <th scope="col"><?php echo ucfirst($key) ?></th>
            <?php endforeach ?>
          </tr>
        </thead>
        <tbody>
          <?php foreach($datas as $data) : ?>
            <tr>
              <?php 
                foreach($data as $key => $value) {
                  if($key === 'name') {
                    echo "<th scope='row'> $value </th>";
                  } else {
                    if($key === 'parking') {
                      if ($value) {
                        echo "<td> Yes </td>";
                      } else {
                        echo "<td> No </td>";
                      }
                    } else {
                      echo "<td> $value </td>";
                    }
                  }
                }
              ?>
            </tr>
          <?php endforeach ?>
        </tbody> 
      </table>
      <?php else: ?>
        <h3>Nessun risultato</h3>
      <?php endif;  ?>
  </div>
  
</body>
</html>