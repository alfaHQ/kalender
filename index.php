<?php

    

    // echo date('Y-n-d', $timestamp);
    
    // $mktime = mktime(0, 0, 0, date('n', $timestamp), 1, date('Y', $timestamp));
    // echo date('Y-n', $mktime);
    // echo date("Y-n", $timestamp);
    // echo $timestamp;

    function is_today( $index ) {
        if( $index == date('d') ) {
            return "highlight bg-danger";
        }
    }

    if( isset($_GET['yn']) ) {
        $yn = $_GET['yn'];
    } else {
        $yn = date('Y-n');
    }

    $timestamp = strtotime($yn);

    $array_bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
    "Oktober", "November", "Desember"];

    $year = date('Y', $timestamp);
    $month = date('n', $timestamp);
    
    $prev = date("Y-n", mktime(0, 0, 0, date('n', $timestamp)-1, 1, date('Y', $timestamp)));
    $next = date("Y-n", mktime(0, 0, 0, date('n', $timestamp)+1, 1, date('Y', $timestamp)));

    $day_count = date('t', $timestamp);

    $today = date('Y-n-d', time());
    $date = $yn . "-" . 1;

    $str  = '';

    for( $i = 1; $i <= $day_count; $i++ ) {

        $date = $yn . "-" . $i;

        if( $today == $date ) {
            $td = '<td class="text-center highlight bg-danger">' . $i .  '</td>';
        } else {
            $td = '<td class="text-center">' . $i .  '</td>';
        }

        if( $i % 7 == 1 ) {
            $str .= '<tr>' . $td;
        } else if( $i % 7 == 0 ) {
            $str .=  $td . '</tr>';
        } else {
            $str .= $td;
        }
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Date Simple</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            overflow-x: hidden;
        }

        tbody tr td:hover {
            background: gray;
            opacity: .7;
            cursor: pointer;
        }

        .highlight {
            opacity: .7;
            cursor: pointer;
            color: white;
        }
        

        .month-button {
            position: absolute;
            width: 20px;
            height: 20px;
        }

        .month-button.previous {
            left: 5%;
            top: 10%;
            border-top: 3px solid gray;
            border-left: 3px solid gray;
            transform: rotate(-50deg);
        }

        .month-button.next {
            top: 10%;
            right: 5%;
            border-top: 3px solid gray;
            border-right: 3px solid gray;
            transform: rotate(50deg);
        }

        
    </style>
  </head>
  <body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">
                <table class="table">
                    <thead>
                        <tr>
                            <td colspan="8" class="text-center">

                                <div class="previous-wrapper">
                                    <a href="?yn=<?= $prev; ?>" class="month-button previous"></a>
                                </div>
                                <div class="bulan font-weight-bold">
                                    <h4 class="text-monospace"><?= $array_bulan[$month-1]; ?></h4>
                                </div>
                                <div class="tahun" data-year-index=""><?= $year; ?></div>
                                <div class="next-wrapper">
                                    <a href="?yn=<?= $next; ?>" class="month-button next"></a>
                                </div>
                            </td>
                        </tr>
                        <tr class="text-danger font-weight-bold">
                            <td>Minggu</td>
                            <td>Senin</td>
                            <td>Selasa</td>
                            <td>Rabu</td>
                            <td>Kamis</td>
                            <td>Jum'at</td>
                            <td>Sabtu</td>
                        </tr>
                    </thead>

                    <tbody class="fw-bold">
                        <?= $str; ?>
                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>