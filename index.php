<?php
$filename = "Staff_List.txt";
if (file_exists($filename)) {
    $file_exist = true;
    $data = file($filename);
    $data_ary = array();
    foreach ($data as $key => $d) {
        $each = explode(',', $d);
        $data_ary[$key] = $each;
    }


    $format_ary = array();
    foreach ($data_ary as $ary) {
        foreach ($ary as $a) {
            $format_ary[$ary[3]] = $ary;
        }
    }

    $employee_id = array();
    $count = 0;
    foreach ($format_ary as $f_key => $f_ary) {

        $employee_id[$count] = preg_replace('/\s+/', '', $f_key);;
        $count++;
    }
} else {
    $file_exist = false;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/style/style.css">
    <link rel="stylesheet" href="public/style/croppie.css" />
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet"> -->

</head>

<body>
    <div class="content" style="padding: 20px 0px 0px 20px;">
        <input type="radio" class="custom-control-input" id="pic" name="pic" value="1" checked onchange="myFunction()">
        <label class="custom-control-label" for="pic">To Fill 2 Staff</label>

        <input type="radio" class="custom-control-input" id="pic" name="pic" value="2" onchange="myFunction()">
        <label class="custom-control-label" for="pic">To Fill 8 Staff</label>
        <script>
            function myFunction() {
                var val = $('input[name="pic"]:checked').val();
                if (val == 1) {
                    var staff2 = document.getElementById("staff2");
                    var staff8 = document.getElementById("staff8");
                    staff8.style.display = "none";
                    staff2.style.display = "block";
                } else {
                    var staff2 = document.getElementById("staff2");
                    var staff8 = document.getElementById("staff8");
                    staff2.style.display = "none";
                    staff8.style.display = "block";
                }
            }
        </script>
    </div>

    <div class="container staff2" id="staff2" style="display: block">

        <div class="row">
            <div class="col-md-6">
                <hr style="color: #000;">
                <form action="export_txt.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Employee ID 1</label>
                        <select name="employee_id1" id="employee_id1">
                            <option value=""></option>
                            <?php foreach ($employee_id as $id) { ?>
                                <option value="<?php echo $id ?>"><?php echo $id ?></option>
                            <?php } ?>
                            <option>Create New</option>
                        </select>
                    </div>

                    <div class="form-group" style="display:none;" id="text_e_id1">
                        <label for="exampleInputPassword1">Employee ID 1</label>
                        <input type="text" class="form-control" name="txt_employee_id1" id="employee_id1" placeholder="Enter Employee ID" value="SGWTOO1" onkeyup="auto_change(this,'#img_e_id_1')">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Japanese Name 1</label>
                        <input type="text" class="form-control" name="japan_name1" id="jpn_name1" placeholder="Enter Japanese Name" onkeyup="auto_change(this,'#img_jpn_name1')">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name 1</label>
                        <input type="text" class="form-control" name="name1" id="name1" placeholder="Enter Name" onkeyup="auto_change(this,'#img_name1')">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Position 1</label>
                        <input type="text" class="form-control" name="position1" id="position1" placeholder="Enter Position" onkeyup="auto_change(this,'#img_position1')">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Photo 1</label>
                        <input type="file" class="form-control" name="photo1" id="photo1">
                    </div>
                    <hr style="color: #000;">

                    <div class="form-group">
                        <label>Employee ID 2</label>
                        <select name="employee_id2" id="employee_id2">
                            <option value=""></option>
                            <?php foreach ($employee_id as $id) { ?>
                                <option value="<?php echo $id ?>"><?php echo $id ?></option>
                            <?php } ?>
                            <option>Create New</option>
                        </select>
                    </div>

                    <div class="form-group" style="display:none;" id="text_e_id2">
                        <label for="exampleInputPassword1">Employee ID 2</label>
                        <input type="text" class="form-control" name="txt_employee_id2" id="employee_id2" placeholder="Enter Employee ID" value="SGWTOO2" onkeyup="auto_change(this,'#img_e_id_2')">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Japanese Name 2</label>
                        <input type="text" class="form-control" name="japan_name2" id="jpn_name2" placeholder="Enter Japanese Name" onkeyup="auto_change(this,'#img_jpn_name2')">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name 2</label>
                        <input type="text" class="form-control" name="name2" id="name2" placeholder="Enter Name" onkeyup="auto_change(this,'#img_name2')">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Position 2</label>
                        <input type="text" class="form-control" name="position2" id="position2" placeholder="Enter Position" onkeyup="auto_change(this,'#img_position2')">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Photo 2</label>
                        <input type="file" class="form-control" name="photo2" id="photo2">
                    </div>

                    <button type="submit" name="btn" value="1" class="btn btn-primary">Save Staff Info</button>
                    <button type="button" class="btn btn-primary" id="export" onclick="download_card()">Export JPG</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="staff_card">
                    <div class="row">
                        <div class="col-md-6 picture1">
                            <div class="row">
                                <div class="sg-header">
                                    <p class="sg-text">SoftGuide</p>
                                    <p class="sg-team">Software Development Team</p>
                                </div>
                                <div class="pre_photo1_div">
                                    <!-- <img id="pre_photo1" src="#" style="display: none"> -->
                                </div>
                                <div class="info1">

                                    <p type="text" name="img_jpn_name1" id="img_jpn_name1"></p>
                                    <p type="text" name="img_name1" id="img_name1"></p>
                                    <!-- <p type="text" name="img_position1" id="img_position1"></p> -->
                                </div>
                                <div class="info1_id">
                                    <p id="img_position1_label">Position :</p>
                                    <p type="text" name="img_position1" id="img_position1"></p>
                                    <p id="img_e_id_1_label">ID<span class="id_label">:</span></p>
                                    <p type="text" name="img_e_id_1" id="img_e_id_1"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 picture2">
                            <div class="row">
                                <div class="sg-header">
                                    <p class="sg-text">SoftGuide</p>
                                    <p class="sg-team">Software Development Team</p>
                                </div>
                                <div class="pre_photo2_div">
                                    <!-- <img id="pre_photo2" src="#" style="display: none"> -->
                                </div>
                                <div class="info2">
                                    <p type="text" name="img_jpn_name2" id="img_jpn_name2"></p>
                                    <p type="text" name="img_name2" id="img_name2"></p>
                                    <!-- <p type="text" name="img_position2" id="img_position2"></p> -->
                                </div>
                                <div class="info2_id">
                                    <p id="img_position2_label">Position :</p>
                                    <p type="text" name="img_position2" id="img_position2"></p>
                                    <p id="img_e_id_2_label">ID<span class="id_label">:</span></p>
                                    <p type="text" name="img_e_id_2" id="img_e_id_2"></p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class= "col-md-6"></div> -->
                    </div>
                </div>
            </div>
            <div id="previewImage"></div>
        </div>
    </div>

    <div class="container staff8" id="staff8" style="display: none">
        <div class="row">
            <div class="col-md-4">
                <hr style="color: #000;">
                <div class="row">
                    <form action="export_txt.php" method="post" enctype="multipart/form-data">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Employee ID 1</label>
                                <select name="employee_id11" id="employee_id11">
                                    <option value=""></option>
                                    <?php foreach ($employee_id as $id) { ?>
                                        <option value="<?php echo $id ?>"><?php echo $id ?></option>
                                    <?php } ?>
                                    <option>Create New</option>
                                </select>
                            </div>

                            <div class="form-group" style="display:none;" id="text_e_id11">
                                <label for="exampleInputPassword1">Employee ID 1</label>
                                <input type="text" class="form-control" name="txt_employee_id11" id="employee_id11" placeholder="Enter Employee ID" value="SGWT0013" onkeyup="auto_change2(this,'#img_e_id_11')">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Japanese Name 1</label>
                                <input type="text" class="form-control" name="japan_name11" id="jpn_name11" placeholder="Enter Japanese Name" onkeyup="auto_change2(this,'#img_jpn_name11')">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name 1</label>
                                <input type="text" class="form-control" name="name11" id="name11" placeholder="Enter Name" onkeyup="auto_change2(this,'#img_name11')">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Position 1</label>
                                <input type="text" class="form-control" name="position11" id="position11" placeholder="Enter Position" onkeyup="auto_change2(this,'#img_position11')">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Photo 1</label>
                                <input type="file" class="form-control" name="photo11" id="photo11">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Employee ID 2</label>
                                <select name="employee_id22" id="employee_id22">
                                    <option value=""></option>
                                    <?php foreach ($employee_id as $id) { ?>
                                        <option value="<?php echo $id ?>"><?php echo $id ?></option>
                                    <?php } ?>
                                    <option>Create New</option>
                                </select>
                            </div>

                            <div class="form-group" style="display:none;" id="text_e_id22">
                                <label for="exampleInputPassword1">Employee ID 2</label>
                                <input type="text" class="form-control" name="txt_employee_id22" id="employee_id22" placeholder="Enter Employee ID" value="SGWT0013" onkeyup="auto_change(this,'#img_e_id_22')">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Japanese Name 2</label>
                                <input type="text" class="form-control" name="japan_name22" id="jpn_name22" placeholder="Enter Japanese Name" onkeyup="auto_change2(this,'#img_jpn_name22')">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name 2</label>
                                <input type="text" class="form-control" name="name22" id="name22" placeholder="Enter Name" onkeyup="auto_change2(this,'#img_name22')">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Position 2</label>
                                <input type="text" class="form-control" name="position22" id="position22" placeholder="Enter Position" onkeyup="auto_change2(this,'#img_position22')">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1">Photo 2</label>
                                <input type="file" class="form-control" name="photo22" id="photo22">
                            </div>
                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="exampleInputPassword1">Employee ID 3</label>
                                <select name="employee_id33" id="employee_id33">
                                    <option value=""></option>
                                    <?php foreach ($employee_id as $id) { ?>
                                        <option value="<?php echo $id ?>"><?php echo $id ?></option>
                                    <?php } ?>
                                    <option>Create New</option>
                                </select>
                            </div>

                            <div class="form-group" style="display:none;" id="text_e_id33">
                                <label for="exampleInputPassword1">Employee ID 3</label>
                                <input type="text" class="form-control" name="txt_employee_id33" id="employee_id33" placeholder="Enter Employee ID" value="SGWT0013" onkeyup="auto_change2(this,'#img_e_id_33')">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Japanese Name 3</label>
                                <input type="text" class="form-control" name="japan_name33" id="jpn_name33" placeholder="Enter Japanese Name" onkeyup="auto_change2(this,'#img_jpn_name33')">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name 3</label>
                                <input type="text" class="form-control" name="name33" id="name33" placeholder="Enter Name" onkeyup="auto_change2(this,'#img_name33')">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Position 3</label>
                                <input type="text" class="form-control" name="position33" id="position33" placeholder="Enter Position" onkeyup="auto_change2(this,'#img_position33')">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1">Photo 3</label>
                                <input type="file" class="form-control" name="photo33" id="photo33">
                            </div>
                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label>Employee ID 4</label>
                                <select name="employee_id44" id="employee_id44">
                                    <option value=""></option>
                                    <?php foreach ($employee_id as $id) { ?>
                                        <option value="<?php echo $id ?>"><?php echo $id ?></option>
                                    <?php } ?>
                                    <option>Create New</option>
                                </select>
                            </div>

                            <div class="form-group" style="display:none;" id="text_e_id44">
                                <label for="exampleInputPassword1">Employee ID 4</label>
                                <input type="text" class="form-control" name="txt_employee_id44" id="employee_id44" placeholder="Enter Employee ID" value="SGWT0013" onkeyup="auto_change(this,'#img_e_id_44')">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Japanese Name 4</label>
                                <input type="text" class="form-control" name="japan_name44" id="jpn_name44" placeholder="Enter Japanese Name" onkeyup="auto_change2(this,'#img_jpn_name44')">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name 4</label>
                                <input type="text" class="form-control" name="name44" id="name44" placeholder="Enter Name" onkeyup="auto_change2(this,'#img_name44')">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Position 4</label>
                                <input type="text" class="form-control" name="position44" id="position44" placeholder="Enter Position" onkeyup="auto_change2(this,'#img_position44')">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Photo 4</label>
                                <input type="file" class="form-control" name="photo44" id="photo44">
                            </div>
                        </div>
                </div>
                <div class="row">
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Employee ID 5</label>
                            <select name="employee_id55" id="employee_id55">
                                <option value=""></option>
                                <?php foreach ($employee_id as $id) { ?>
                                    <option value="<?php echo $id ?>"><?php echo $id ?></option>
                                <?php } ?>
                                <option>Create New</option>
                            </select>
                        </div>

                        <div class="form-group" style="display:none;" id="text_e_id55">
                            <label for="exampleInputPassword1">Employee ID 5</label>
                            <input type="text" class="form-control" name="txt_employee_id55" id="employee_id55" placeholder="Enter Employee ID" value="SGWT0013" onkeyup="auto_change2(this,'#img_e_id_55')">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Japanese Name 5</label>
                            <input type="text" class="form-control" name="japan_name55" id="jpn_name55" placeholder="Enter Japanese Name" onkeyup="auto_change2(this,'#img_jpn_name55')">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Name 5</label>
                            <input type="text" class="form-control" name="name55" id="name55" placeholder="Enter Name" onkeyup="auto_change2(this,'#img_name55')">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Position 5</label>
                            <input type="text" class="form-control" name="position55" id="position55" placeholder="Enter Position" onkeyup="auto_change2(this,'#img_position55')">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Photo 5</label>
                            <input type="file" class="form-control" name="photo55" id="photo55">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Employee ID 6</label>
                            <select name="employee_id66" id="employee_id66">
                                <option value=""></option>
                                <?php foreach ($employee_id as $id) { ?>
                                    <option value="<?php echo $id ?>"><?php echo $id ?></option>
                                <?php } ?>
                                <option>Create New</option>
                            </select>
                        </div>

                        <div class="form-group" style="display:none;" id="text_e_id66">
                            <label for="exampleInputPassword1">Employee ID 6</label>
                            <input type="text" class="form-control" name="txt_employee_id66" id="employee_id66" placeholder="Enter Employee ID" value="SGWT0013" onkeyup="auto_change(this,'#img_e_id_66')">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Japanese Name 6</label>
                            <input type="text" class="form-control" name="japan_name66" id="jpn_name66" placeholder="Enter Japanese Name" onkeyup="auto_change2(this,'#img_jpn_name66')">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Name 6</label>
                            <input type="text" class="form-control" name="name66" id="name66" placeholder="Enter Name" onkeyup="auto_change2(this,'#img_name66')">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Position 6</label>
                            <input type="text" class="form-control" name="position66" id="position66" placeholder="Enter Position" onkeyup="auto_change2(this,'#img_position66')">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Photo 6</label>
                            <input type="file" class="form-control" name="photo66" id="photo66">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Employee ID 7</label>
                            <select name="employee_id77" id="employee_id77">
                                <option value=""></option>
                                <?php foreach ($employee_id as $id) { ?>
                                    <option value="<?php echo $id ?>"><?php echo $id ?></option>
                                <?php } ?>
                                <option>Create New</option>
                            </select>
                        </div>

                        <div class="form-group" style="display:none;" id="text_e_id77">
                            <label for="exampleInputPassword1">Employee ID 7</label>
                            <input type="text" class="form-control" name="txt_employee_id77" id="employee_id77" placeholder="Enter Employee ID" value="SGWT0013" onkeyup="auto_change2(this,'#img_e_id_77')">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Japanese Name 7</label>
                            <input type="text" class="form-control" name="japan_name77" id="jpn_name77" placeholder="Enter Japanese Name" onkeyup="auto_change2(this,'#img_jpn_name77')">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Name 7</label>
                            <input type="text" class="form-control" name="name77" id="name77" placeholder="Enter Name" onkeyup="auto_change2(this,'#img_name77')">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Position 7</label>
                            <input type="text" class="form-control" name="position77" id="position77" placeholder="Enter Position" onkeyup="auto_change2(this,'#img_position77')">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Photo 7</label>
                            <input type="file" class="form-control" name="photo77" id="photo77">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Employee ID 8</label>
                            <select name="employee_id88" id="employee_id88">
                                <option value=""></option>
                                <?php foreach ($employee_id as $id) { ?>
                                    <option value="<?php echo $id ?>"><?php echo $id ?></option>
                                <?php } ?>
                                <option>Create New</option>
                            </select>
                        </div>

                        <div class="form-group" style="display:none;" id="text_e_id88">
                            <label for="exampleInputPassword1">Employee ID 8</label>
                            <input type="text" class="form-control" name="txt_employee_id88" id="employee_id88" placeholder="Enter Employee ID" value="SGWT0013" onkeyup="auto_change(this,'#img_e_id_88')">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Japanese Name 8</label>
                            <input type="text" class="form-control" name="japan_name88" id="jpn_name88" placeholder="Enter Japanese Name" onkeyup="auto_change2(this,'#img_jpn_name88')">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Name 8</label>
                            <input type="text" class="form-control" name="name88" id="name88" placeholder="Enter Name" onkeyup="auto_change2(this,'#img_name88')">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Position 8</label>
                            <input type="text" class="form-control" name="position88" id="position88" placeholder="Enter Position" onkeyup="auto_change2(this,'#img_position88')">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Photo 8</label>
                            <input type="file" class="form-control" name="photo88" id="photo88">
                        </div>
                    </div>
                </div>

                <button type="submit" name="btn" value="2" class="btn btn-primary">Save Staff Info</button>
                <button type="button" class="btn btn-primary" id="export" onclick="download_card2()">Export JPG</button>
                </form>
            </div>
            <div class="col-md-8">
                <div class="staff_card2">
                    <div class="row first_row">
                        <div class="col-md-3 picture11 ">
                            <div class="sg-header-first">
                                <p class="sg-text-first">SoftGuide</p>
                                <p class="sg-team-first">Software Development Team</p>
                            </div>
                            <div class="pre_photo11_div">
                                <!-- <img id="pre_photo11" src="#" style="display: none"> -->
                            </div>
                            <div class="info11">
                                <p type="text" name="img_jpn_name11" id="img_jpn_name11"></p>
                                <p type="text" name="img_name11" id="img_name11"></p>
                                <!-- <p type="text" name="img_position11" id="img_position11"></p> -->
                            </div>
                            <div class="info11_id">
                                <p id="img_position11_label">Position :</p>
                                <p type="text" name="img_position11" id="img_position11"></p>
                                <p id="img_e_id_11_label">ID<span class="id_label">:</span></p>
                                <p type="text" name="img_e_id_11" id="img_e_id_11"></p>
                            </div>
                        </div>
                        <div class="col-md-3 picture22 ">
                            <div class="sg-header-first">
                                <p class="sg-text-first">SoftGuide</p>
                                <p class="sg-team-first">Software Development Team</p>
                            </div>
                            <div class=" pre_photo22_div">
                                <!-- <img id="pre_photo22" src="#" style="display: none"> -->
                            </div>
                            <div class="info22">
                                <p type="text" name="img_jpn_name22" id="img_jpn_name22"></p>
                                <p type="text" name="img_name22" id="img_name22"></p>
                                <!-- <p type="text" name="img_position22" id="img_position22"></p> -->
                            </div>
                            <div class="info22_id">
                                <p id="img_position22_label">Position :</p>
                                <p type="text" name="img_position22" id="img_position22"></p>
                                <p id="img_e_id_22_label">ID<span class="id_label">:</span></p>
                                <p type="text" name="img_e_id_2" id="img_e_id_22"></p>
                            </div>
                        </div>
                        <div class="col-md-3 picture33 ">
                            <div class="sg-header-first">
                                <p class="sg-text-first">SoftGuide</p>
                                <p class="sg-team-first">Software Development Team</p>
                            </div>
                            <div class=" pre_photo33_div">
                                <!-- <img id="pre_photo33" src="#" style="display: none"> -->
                            </div>
                            <div class="info33">
                                <p type="text" name="img_jpn_name33" id="img_jpn_name33"></p>
                                <p type="text" name="img_name33" id="img_name33"></p>
                                <!-- <p type="text" name="img_position33" id="img_position33"></p> -->
                            </div>
                            <div class="info33_id">
                                <p id="img_position33_label">Position :</p>
                                <p type="text" name="img_position33" id="img_position33"></p>
                                <p id="img_e_id_33_label">ID<span class="id_label">:</span></p>
                                <p type="text" name="img_e_id_33" id="img_e_id_33"></p>
                            </div>
                        </div>
                        <div class="col-md-3 picture44 ">
                            <div class="sg-header-first">
                                <p class="sg-text-first">SoftGuide</p>
                                <p class="sg-team-first">Software Development Team</p>
                            </div>
                            <div class=" pre_photo44_div">
                                <!-- <img id="pre_photo44" src="#" style="display: none"> -->
                            </div>
                            <div class="info44">
                                <p type="text" name="img_jpn_name44" id="img_jpn_name44"></p>
                                <p type="text" name="img_name44" id="img_name44"></p>
                                <!-- <p type="text" name="img_position44" id="img_position44"></p> -->
                            </div>
                            <div class="info44_id">
                                <p id="img_position44_label">Position :</p>
                                <p type="text" name="img_position44" id="img_position44"></p>
                                <p id="img_e_id_44_label">ID<span class="id_label">:</span></p>
                                <p type="text" name="img_e_id_4" id="img_e_id_44"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row second_row">
                        <div class="col-md-3 picture55 ">
                            <div class="sg-header-second">
                                <p class="sg-text-second">SoftGuide</p>
                                <p class="sg-team-second">Software Development Team</p>
                            </div>
                            <div class=" pre_photo55_div">
                                <!-- <img id="pre_photo55" src="#" style="display: none"> -->
                            </div>
                            <div class="info55">
                                <p type="text" name="img_jpn_name55" id="img_jpn_name55"></p>
                                <p type="text" name="img_name55" id="img_name55"></p>
                                <!-- <p type="text" name="img_position55" id="img_position55"></p> -->
                            </div>
                            <div class="info55_id">
                                <p id="img_position55_label">Position :</p>
                                <p type="text" name="img_position55" id="img_position55"></p>
                                <p id="img_e_id_55_label">ID<span class="id_label">:</span></p>
                                <p type="text" name="img_e_id_55" id="img_e_id_55"></p>
                            </div>
                        </div>
                        <div class="col-md-3 picture66 ">
                            <div class="sg-header-second">
                                <p class="sg-text-second">SoftGuide</p>
                                <p class="sg-team-second">Software Development Team</p>
                            </div>
                            <div class=" pre_photo66_div">
                                <!-- <img id="pre_photo66" src="#" style="display: none"> -->
                            </div>
                            <div class="info66">
                                <p type="text" name="img_jpn_name66" id="img_jpn_name66"></p>
                                <p type="text" name="img_name66" id="img_name66"></p>
                                <!-- <p type="text" name="img_position66" id="img_position66"></p> -->
                            </div>
                            <div class="info66_id">
                                <p id="img_position66_label">Position :</p>
                                <p type="text" name="img_position66" id="img_position66"></p>
                                <p id="img_e_id_66_label">ID<span class="id_label">:</span></p>
                                <p type="text" name="img_e_id_66" id="img_e_id_66"></p>
                            </div>
                        </div>
                        <div class="col-md-3 picture77 ">
                            <div class="sg-header-second">
                                <p class="sg-text-second">SoftGuide</p>
                                <p class="sg-team-second">Software Development Team</p>
                            </div>
                            <div class="pre_photo77_div">
                                <!-- <img id="pre_photo77" src="#" style="display: none"> -->
                            </div>
                            <div class="info77">
                                <p type="text" name="img_jpn_name77" id="img_jpn_name77"></p>
                                <p type="text" name="img_name77" id="img_name77"></p>
                                <!-- <p type="text" name="img_position77" id="img_position77"></p> -->
                            </div>
                            <div class="info77_id">
                                <p id="img_position77_label">Position :</p>
                                <p type="text" name="img_position77" id="img_position77"></p>
                                <p id="img_e_id_77_label">ID<span class="id_label">:</span></p>
                                <p type="text" name="img_e_id_77" id="img_e_id_77"></p>
                            </div>
                        </div>
                        <div class="col-md-3 picture88 ">
                            <div class="sg-header-second">
                                <p class="sg-text-second">SoftGuide</p>
                                <p class="sg-team-second">Software Development Team</p>
                            </div>
                            <div class=" pre_photo88_div">
                                <!-- <img id="pre_photo88" src="#" style="display: none"> -->
                            </div>
                            <div class="info88">
                                <p type="text" name="img_jpn_name88" id="img_jpn_name88"></p>
                                <p type="text" name="img_name88" id="img_name88"></p>
                                <!-- <p type="text" name="img_position88" id="img_position88"></p> -->
                            </div>
                            <div class="info88_id">
                                <p id="img_position88_label">Position :</p>
                                <p type="text" name="img_position88" id="img_position88"></p>
                                <p id="img_e_id_88_label">ID<span class="id_label">:</span></p>
                                <p type="text" name="img_e_id_88" id="img_e_id_88"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="previewImage"></div>
        </div>
    </div>

    <div id="data"></div>

    <!-- alert model -->
    <div id="uploadimageModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload & Crop Image</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 text-center">
                            <div id="image_demo" style="width:350px; margin-top:30px"></div>
                        </div>
                        <div class="col-md-4" style="padding-top:30px;">
                            <br />
                            <br />
                            <br />
                            <button class="btn btn-success crop_image">Crop & Upload Image</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="closeBtn">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="public/js/jquery.js"></script>
    <script src="public/js/index.js"></script>
    <script src="public/js/html2canvas.js"></script>
    <script src="public/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/js/croppie.js"></script>
    <script>
        $(document).ready(function() {
            $image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                    width: 200,
                    height: 200,
                    type: 'circle' //square
                },
                boundary: {
                    width: 300,
                    height: 300
                }
            });
            var currentFileInputId;
            $('#photo1,#photo2,#photo11, #photo22,#photo33, #photo44,#photo55,#photo66,#photo77,#photo88').on('change', function() {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function() {});
                }
                reader.readAsDataURL(this.files[0]);
                currentFileInputId = $(this).attr('id');
                $('#uploadimageModal').modal('show');
            });

            $('.crop_image').click(function(event) {
                var photoDiv = 'pre_' + currentFileInputId;
                $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response) {
                    $.ajax({
                        url: "upload.php",
                        type: "POST",
                        data: {
                            "image": response,
                            "photoDiv": photoDiv
                        },
                        success: function(data) {
                            $('#uploadimageModal').modal('hide');
                            $('.' + photoDiv + '_div').html(data);
                        }
                    });
                });
            });

            $('#closeBtn').on('click', function() {
                $('#' + currentFileInputId).val('');
            });

        });

        //updated 4 pic

        $('#employee_id1').change(function() {
            if ($('#employee_id1 option:selected').text() == "Create New") {
                $('#text_e_id1').show();
                $('#jpn_name1').val('');
                $('#name1').val('');
                $('#position1').val('');
                $('#img_jpn_name1').text('');
                $('#img_name1').text('');
                $('#img_position1').text();
                $('#img_e_id_1').text('');
            } else {
                $('#text_e_id1').hide();
            }
            var select = $("#employee_id1 option:selected").val();

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    "e_id": select
                },

                success: function(event) {
                    if ($('#employee_id1 option:selected').text() !== "Create New") {
                        var paramObj = JSON.parse(event);
                        $('#jpn_name1').val(paramObj.jp_name);
                        $('#name1').val(paramObj.name);
                        $('#position1').val(paramObj.position);
                        $('#img_jpn_name1').text(paramObj.jp_name);
                        $('#img_name1').text(paramObj.name);
                        $('#img_position1').text(paramObj.position);
                        $('#img_e_id_1').text(select);
                    } else {
                        var staffId = $("#text_e_id1 input").val();
                        $('#img_e_id_1').text(staffId);
                    }
                }
            })
        })


        $('#employee_id2').change(function() {

            if ($('#employee_id2 option:selected').text() == "Create New") {
                $('#text_e_id2').show();
                $('#jpn_name2').val('');
                $('#name2').val('');
                $('#position2').val('');
                $('#img_jpn_name2').text('');
                $('#img_name2').text('');
                $('#img_position2').text('');
                $('#img_e_id_2').text('');
            } else {
                $('#text_e_id2').hide();
            }
            var select = $("#employee_id2 option:selected").val();

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    "e_id": select
                },

                success: function(event) {
                    if ($('#employee_id2 option:selected').text() !== "Create New") {
                        var paramObj = JSON.parse(event);
                        $('#jpn_name2').val(paramObj.jp_name);
                        $('#name2').val(paramObj.name);
                        $('#position2').val(paramObj.position);
                        $('#img_jpn_name2').text(paramObj.jp_name);
                        $('#img_name2').text(paramObj.name);
                        $('#img_position2').text(paramObj.position);
                        $('#img_e_id_2').text(select);
                        maxNewNum2 = 0
                    } else {
                        var staffId = $("#text_e_id2 input").val();
                        $('#img_e_id_2').text(staffId);
                    }
                }
            })
        })

        //updated 8 pic
        $('#employee_id11').change(function() {
            if ($('#employee_id11 option:selected').text() == "Create New") {
                $('#text_e_id11').show();
                $('#jpn_name11').val('');
                $('#name11').val('');
                $('#position11').val('');
                $('#img_jpn_name11').text('');
                $('#img_name11').text('');
                $('#img_position11').text('');
                $('#img_e_id_11').text('');
            } else {
                $('#text_e_id11').hide();
            }
            var select = $("#employee_id11 option:selected").val();
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    "e_id": select
                },

                success: function(event) {
                    if ($('#employee_id11 option:selected').text() !== "Create New") {
                        var paramObj = JSON.parse(event);
                        $('#jpn_name11').val(paramObj.jp_name);
                        $('#name11').val(paramObj.name);
                        $('#position11').val(paramObj.position);
                        $('#img_jpn_name11').text(paramObj.jp_name);
                        $('#img_name11').text(paramObj.name);
                        $('#img_position11').text(paramObj.position);
                        $('#img_e_id_11').text(select);

                    } else {
                        var staffId = $("#text_e_id11 input").val();
                        $('#img_e_id_11').text(staffId);
                    }
                }
            })
        })

        $('#employee_id22').change(function() {

            if ($('#employee_id22 option:selected').text() == "Create New") {
                $('#text_e_id22').show();
                $('#jpn_name22').val('');
                $('#name22').val('');
                $('#position22').val('');
                $('#img_jpn_name22').text('');
                $('#img_name22').text('');
                $('#img_position22').text('');
                $('#img_e_id_22').text('');
            } else {
                $('#text_e_id22').hide();
            }
            var select = $("#employee_id22 option:selected").val();

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    "e_id": select
                },

                success: function(event) {
                    if ($('#employee_id22 option:selected').text() !== "Create New") {
                        var paramObj = JSON.parse(event);
                        $('#jpn_name22').val(paramObj.jp_name);
                        $('#name22').val(paramObj.name);
                        $('#position22').val(paramObj.position);
                        $('#img_jpn_name22').text(paramObj.jp_name);
                        $('#img_name22').text(paramObj.name);
                        $('#img_position22').text(paramObj.position);
                        $('#img_e_id_22').text(select);
                    } else {
                        var staffId = $("#text_e_id22 input").val();
                        $('#img_e_id_22').text(staffId);
                    }
                }
            })
        })

        $('#employee_id33').change(function() {

            if ($('#employee_id33 option:selected').text() == "Create New") {
                $('#text_e_id33').show();
                $('#jpn_name33').val('');
                $('#name33').val('');
                $('#position33').val('');
                $('#img_jpn_name33').text('');
                $('#img_name33').text('');
                $('#img_position33').text('');
                $('#img_e_id_33').text('');

            } else {
                $('#text_e_id33').hide();
            }
            var select = $("#employee_id33 option:selected").val();

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    "e_id": select
                },

                success: function(event) {
                    if ($('#employee_id33 option:selected').text() !== "Create New") {
                        var paramObj = JSON.parse(event);
                        $('#jpn_name33').val(paramObj.jp_name);
                        $('#name33').val(paramObj.name);
                        $('#position33').val(paramObj.position);
                        $('#img_jpn_name33').text(paramObj.jp_name);
                        $('#img_name33').text(paramObj.name);
                        $('#img_position33').text(paramObj.position);
                        $('#img_e_id_33').text(select);

                    } else {
                        var staffId = $("#text_e_id33 input").val();
                        $('#img_e_id_33').text(staffId);
                    }
                }
            })
        })

        $('#employee_id44').change(function() {
            if ($('#employee_id44 option:selected').text() == "Create New") {
                $('#text_e_id44').show();
                $('#jpn_name44').val('');
                $('#name44').val('');
                $('#position44').val('');
                $('#img_jpn_name44').text('');
                $('#img_name44').text('');
                $('#img_position44').text('');
                $('#img_e_id_44').text('');
            } else {
                $('#text_e_id44').hide();
            }
            var select = $("#employee_id44 option:selected").val();

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    "e_id": select
                },

                success: function(event) {
                    if ($('#employee_id44 option:selected').text() !== "Create New") {
                        var paramObj = JSON.parse(event);
                        $('#jpn_name44').val(paramObj.jp_name);
                        $('#name44').val(paramObj.name);
                        $('#position44').val(paramObj.position);
                        $('#img_jpn_name44').text(paramObj.jp_name);
                        $('#img_name44').text(paramObj.name);
                        $('#img_position44').text(paramObj.position);
                        $('#img_e_id_44').text(select);
                    } else {
                        var staffId = $("#text_e_id44 input").val();
                        $('#img_e_id_44').text(staffId);
                    }
                }
            })
        })

        $('#employee_id55').change(function() {
            if ($('#employee_id55 option:selected').text() == "Create New") {
                $('#text_e_id55').show();
                $('#jpn_name55').val('');
                $('#name55').val('');
                $('#position55').val('');
                $('#img_jpn_name55').text('');
                $('#img_name55').text('');
                $('#img_position55').text('');
                $('#img_e_id_55').text('');
            } else {
                $('#text_e_id55').hide();
            }
            var select = $("#employee_id55 option:selected").val();

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    "e_id": select
                },

                success: function(event) {
                    if ($('#employee_id55 option:selected').text() !== "Create New") {
                        var paramObj = JSON.parse(event);
                        $('#jpn_name55').val(paramObj.jp_name);
                        $('#name55').val(paramObj.name);
                        $('#position55').val(paramObj.position);
                        $('#img_jpn_name55').text(paramObj.jp_name);
                        $('#img_name55').text(paramObj.name);
                        $('#img_position55').text(paramObj.position);
                        $('#img_e_id_55').text(select);
                    } else {
                        var staffId = $("#text_e_id55 input").val();
                        $('#img_e_id_55').text(staffId);
                    }
                }
            })
        })

        $('#employee_id66').change(function() {
            if ($('#employee_id66 option:selected').text() == "Create New") {
                $('#text_e_id66').show();
                $('#jpn_name66').val('');
                $('#name66').val('');
                $('#position66').val('');
                $('#img_jpn_name66').text('');
                $('#img_name66').text('');
                $('#img_position66').text('');
                $('#img_e_id_66').text('');
            } else {
                $('#text_e_id66').hide();
            }
            var select = $("#employee_id66 option:selected").val();

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    "e_id": select
                },

                success: function(event) {
                    if ($('#employee_id66 option:selected').text() !== "Create New") {
                        var paramObj = JSON.parse(event);
                        $('#jpn_name66').val(paramObj.jp_name);
                        $('#name66').val(paramObj.name);
                        $('#position66').val(paramObj.position);
                        $('#img_jpn_name66').text(paramObj.jp_name);
                        $('#img_name66').text(paramObj.name);
                        $('#img_position66').text(paramObj.position);
                        $('#img_e_id_66').text(select);
                    } else {
                        var staffId = $("#text_e_id66 input").val();
                        $('#img_e_id_66').text(staffId);
                    }
                }
            })
        })

        $('#employee_id77').change(function() {
            if ($('#employee_id77 option:selected').text() == "Create New") {
                $('#text_e_id77').show();
                $('#jpn_name77').val('');
                $('#name77').val('');
                $('#position77').val('');
                $('#img_jpn_name77').text('');
                $('#img_name77').text('');
                $('#img_position77').text('');
                $('#img_e_id_77').text('');
            } else {
                $('#text_e_id77').hide();
            }
            var select = $("#employee_id77 option:selected").val();

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    "e_id": select
                },

                success: function(event) {
                    if ($('#employee_id77 option:selected').text() !== "Create New") {
                        var paramObj = JSON.parse(event);
                        $('#jpn_name77').val(paramObj.jp_name);
                        $('#name77').val(paramObj.name);
                        $('#position77').val(paramObj.position);
                        $('#img_jpn_name77').text(paramObj.jp_name);
                        $('#img_name77').text(paramObj.name);
                        $('#img_position77').text(paramObj.position);
                        $('#img_e_id_77').text(select);
                    } else {
                        var staffId = $("#text_e_id77 input").val();
                        $('#img_e_id_77').text(staffId);
                    }
                }
            })
        })

        $('#employee_id88').change(function() {
            if ($('#employee_id88 option:selected').text() == "Create New") {
                $('#text_e_id88').show();
                $('#jpn_name88').val('');
                $('#name88').val('');
                $('#position88').val('');
                $('#img_jpn_name88').text('');
                $('#img_name88').text('');
                $('#img_position88').text('');
                $('#img_e_id_88').text('');
            } else {
                $('#text_e_id88').hide();
            }
            var select = $("#employee_id88 option:selected").val();

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    "e_id": select
                },
                success: function(event) {
                    if ($('#employee_id88 option:selected').text() !== "Create New") {
                        var paramObj = JSON.parse(event);
                        $('#jpn_name88').val(paramObj.jp_name);
                        $('#name88').val(paramObj.name);
                        $('#position88').val(paramObj.position);
                        $('#img_jpn_name88').text(paramObj.jp_name);
                        $('#img_name88').text(paramObj.name);
                        $('#img_position88').text(paramObj.position);
                        $('#img_e_id_88').text(select);
                    } else {
                        var staffId = $("#text_e_id88 input").val();
                        $('#img_e_id_88').text(staffId);
                    }
                }
            })
        })
    </script>
</body>

</html>