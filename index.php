<!DOCTYPE html>
<html lang="en"  style="background-color:#4d5b6e">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GT Transfer</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" />
    </head>
    <body >
        <!-- Masthead-->
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <h1 class="mb-5">Search GT Course Number</h1>
                            <form class="form-subscribe" method="POST">
                                <!-- Email address input-->
                                <div class="row mb-1">
                                    <div class="col">
                                        <input class="form-control form-control-lg" name="course" type="text" placeholder="Course Num" required value="<?=isset($_POST['course']) ? $_POST['course'] : ""?>"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control form-control-lg" name="state">
                                            <option value="" <?=isset($_POST['state']) ? "" : "selected"?>>Filter by State ▼</option>
                                            <?php
                                            $states = array("AK"=>"Alaska",
                                            "AZ"=>"Arizona",
                                            "AR"=>"Arkansas",
                                            "CA"=>"California",
                                            "CO"=>"Colorado",
                                            "CT"=>"Connecticut",
                                            "DE"=>"Delaware",
                                            "DC"=>"District Of Columbia",
                                            "FL"=>"Florida",
                                            "GA"=>"Georgia",
                                            "HI"=>"Hawaii",
                                            "ID"=>"Idaho",
                                            "IL"=>'Illinois',
                                            "IN"=>'Indiana',
                                            "IA"=>'Iowa',
                                            "KS"=>'Kansas',
                                            "KY"=>'Kentucky',
                                            "LA"=>'Louisiana',
                                            "ME"=>'Maine',
                                            "MD"=>'Maryland',
                                            "MA"=>'Massachusetts',
                                            "MI"=>'Michigan',
                                            "MN"=>'Minnesota',
                                            "MS"=>'Mississippi',
                                            "MO"=>'Missouri',
                                            "MT"=>'Montana',
                                            "NE"=>'Nebraska',
                                            "NV"=>'Nevada',
                                            "NH"=>'New Hampshire',
                                            "NJ"=>'New Jersey',
                                            "NM"=>'New Mexico',
                                            "NY"=>'New York',
                                            "NC"=>'North Carolina',
                                            "ND"=>'North Dakota',
                                            "OH"=>'Ohio',
                                            "OK"=>'Oklahoma',
                                            "OR"=>'Oregon',
                                            "PA"=>'Pennsylvania',
                                            "RI"=>'Rhode Island',
                                            "SC"=>'South Carolina',
                                            "SD"=>'South Dakota',
                                            "TN"=>'Tennessee',
                                            "TX"=>'Texas',
                                            "UT"=>'Utah',
                                            "VT"=>'Vermont',
                                            "VA"=>'Virginia',
                                            "WA"=>'Washington',
                                            "WV"=>'West Virginia',
                                            "WI"=>'Wisconsin',
                                            "WY"=>'Wyoming');
                                            foreach($states as $key => $stateName){
                                                echo @$_POST['state'] == $key ? "<option value='$key' selected>$stateName</option>" : "<option value='$key'>$stateName</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-auto"><button class="btn btn-primary btn-lg" type="submit">Search</button></div>
                                </div>
                            </form>
                            <?=isset($_POST['course']) ? "<br><br><h2 class='mb-5'>".strtoupper($_POST['course'])."</h2>" : ""?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section style="background-color:#4d5b6e" >
        <?php
        if(isset($_POST['course'])){
            echo 
            '<table class="center">
                <tr class = "classes">
                    <th>University</th>
                    <th>Transfer Course</th>
                </tr>';
            require 'inc/dbh.inc.php';
            if(isset($_POST['state']) && $_POST['state'] != ""){
                $q = $conn->prepare("SELECT `university name`,`GT course name`,`transfer course name` FROM `classes` WHERE `GT course name` LIKE ? AND `Location` LIKE CONCAT('%',?,'%') ORDER BY `university name` ASC");
                $q->bind_param("ss",$_POST['course'], $_POST['state']);
            } else {
                $q = $conn->prepare("SELECT `university name`,`GT course name`,`transfer course name` FROM `classes` WHERE `GT course name` LIKE ? ORDER BY `university name` ASC");
                $q->bind_param("s",$_POST['course']);
            }
            $q->execute();
            $q->bind_result($uniName, $GTCoursename, $tCourseName);
            while($q->fetch()){
                ?>
                <tr>
                    <td class = "classes"><?=$uniName?></td>
                    <td class = "classes"><?=$tCourseName?></td>
                </tr>


                <?php
            }
        }
        ?>
        </table>
        <br><br>
        </section>

        <!-- Icons Grid-->
        <!-- Bootstrap core JS-->
        <!-- Core theme JS-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
