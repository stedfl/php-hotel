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
  <h1>Elenco Hotel</h1>
  <table class="table">
  <thead>
    <tr>
      <?php foreach($hotels[0] as $key => $value) : ?>
      <th scope="col"><?php echo ucfirst($key) ?></th>
      <?php endforeach ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach($hotels as $hotel) : ?>
      <tr>
        <?php foreach($hotel as $key => $value) : ?>
          <td scope="row">
            <?php if($key === 'parking') {
              if ($value) {
                echo 'Si';
              } else {
                echo 'No';
              }
            } else {
              echo $value;
            }
            ?>
          </td>
        <?php endforeach ?>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
  
</body>
</html>