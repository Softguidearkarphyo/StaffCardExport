<?php

$filename = "Staff_List.txt";
$form_data = $_POST;
$value = $_POST['btn'];
if ($value == "1") {
    $jpn_name1 = $_POST['japan_name1'];
    $name1      = $_POST['name1'];
    $position1 = $_POST['position1'];
    $e_id1 = $_POST['employee_id1'];
    //$txt_employee_id1 = $_POST['$txt_employee_id1'];

    $for_one = "";
    $employee_id1 = "";
    if ($jpn_name1 || $name1 || $position1 || $employee_id1) {
        if ($e_id1 == "Create New") {
            $employee_id1 = $_POST['txt_employee_id1'];
        } else {
            $employee_id1 = $_POST['employee_id1'];
        }
        $for_one  = $jpn_name1 . ',' . $name1 . ',' . $position1 . ',' . $employee_id1;
    }


    $jpn_name2 = $_POST['japan_name2'];
    $name2      = $_POST['name2'];
    $position2 = $_POST['position2'];
    $e_id2 = $_POST['employee_id2'];

    $for_two = "";
    $employee_id2 = "";
    if ($jpn_name2 || $name2 || $position2 || $employee_id2) {
        if ($e_id2 == "Create New") {
            $employee_id2 = $_POST['txt_employee_id2'];
        } else {
            $employee_id2 = $_POST['employee_id2'];
        }
        $for_two  = $jpn_name2 . ',' . $name2 . ',' . $position2 . ',' . $employee_id2;
    }

    if ($for_one && $for_two) {
        $data_arr = array($for_one, $for_two);
    } else if ($for_one && !$for_two) {
        $data_arr = array($for_one);
    } else if (!$for_one && $for_two) {
        $data_arr = array($for_two);
    } else {
        $data_arr = array();
    }

    /*foreach ($data_arr as $data){
        if(file_exists($filename)){
            $current = file_get_contents($filename);
            if($current == true){
                $current .= $data."\r\n";

                file_put_contents($filename, $current);
            }else{
                file_put_contents($filename,$data."\r\n");
            }

        }else{
            file_put_contents($filename,$data."\r\n");
            chmod($filename,0777);
        }
    }*/
    if (file_exists($filename)) {
        $e_data = file($filename);
        $e_data_ary = array();
        foreach ($e_data as $key => $e_d) {
            $each = explode(',', $e_d);
            $e_data_ary[$key] = $each;
        }


        $e_format_ary = array();
        foreach ($e_data_ary as $e_ary) {
            foreach ($e_ary as $a) {
                $e_format_ary[$e_ary[3]] = $e_ary;
            }
        }

        $employee_id = array();
        $count = 0;
        foreach ($e_format_ary as $f_key => $f_ary) {

            $employee_id[$count] = preg_replace('/\s+/', '', $f_key);
            $count++;
        }

        foreach ($e_data as $line_num => $e_d) {
            $new_parts = explode(',', $e_d);
            $file_e_id = preg_replace('/\s+/', '', $new_parts[3]);
            switch ($file_e_id) {
                case $employee_id1:
                    $new_parts[0] = $jpn_name1;
                    $new_parts[1] = $name1;
                    $new_parts[2] = $position1;
                    $e_data[$line_num] = implode(',', $new_parts);
                    $UpdatedContents = implode("", $e_data);
                    file_put_contents($filename, $UpdatedContents);
                    break;

                case $employee_id2:
                    $new_parts[0] = $jpn_name2;
                    $new_parts[1] = $name2;
                    $new_parts[2] = $position2;
                    $e_data[$line_num] = implode(',', $new_parts);
                    $UpdatedContents = implode("", $e_data);
                    file_put_contents($filename, $UpdatedContents);
                    break;
            }
        }
        if (!in_array($employee_id1, $employee_id) && $employee_id1 != "") {
            $current = file_get_contents($filename);
            // $current .= "" . $for_one . "\r\n";
            $current .=  "\r\n". $for_one ;

            file_put_contents($filename, $current);
        }
        if (!in_array($employee_id2, $employee_id) && $employee_id2 != "") {
            $current = file_get_contents($filename);
            $current .= "\r\n".$for_two ;

            file_put_contents($filename, $current);
        }
        /*foreach ($data_arr as $data){
            $current = file_get_contents($filename);
            if($current == true){
                $current .= $data."\r\n";

                file_put_contents($filename, $current);
            }else{
                file_put_contents($filename,$data."\r\n");
            }
        }*/
    } else {
        print_r($for_one);
        $data = $for_one . "\r\n" . $for_two;
        file_put_contents($filename, $data);
        /*foreach ($data_arr as $data){
            file_put_contents($filename,$data."\r\n");

        }*/
        chmod($filename, 0777);
    }
}
//added for 8 pic
else if ($value == "2") {
    $jpn_name11 = $_POST['japan_name11'];
    $name11      = $_POST['name11'];
    $position11 = $_POST['position11'];
    $e_id11 = $_POST['employee_id11'];
    // if($e_id11 == "Create New"){
    //     $employee_id11 = $_POST['txt_employee_id11'];
    // }else{
    //     $employee_id11 = $_POST['employee_id11'];
    // }
    // $for_one  = $jpn_name11.','.$name11.','.$position11.','.$employee_id11;
    $for_one = "";
    $employee_id11 = "";
    if ($jpn_name11 || $name11 || $position11 || $employee_id11) {
        if ($e_id11 == "Create New") {
            $employee_id11 = $_POST['txt_employee_id11'];
        } else {
            $employee_id11 = $_POST['employee_id11'];
        }
        $for_one  = $jpn_name11 . ',' . $name11 . ',' . $position11 . ',' . $employee_id11;
    }

    $jpn_name22 = $_POST['japan_name22'];
    $name22      = $_POST['name22'];
    $position22 = $_POST['position22'];
    $e_id22 = $_POST['employee_id22'];
    // if($e_id22 == "Create New"){
    //     $employee_id22 = $_POST['txt_employee_id22'];
    // }else{
    //     $employee_id22 = $_POST['employee_id22'];
    // }
    // $for_two  = $jpn_name22.','.$name22.','.$position22.','.$employee_id22;
    $for_two = "";
    $employee_id22 = "";
    if ($jpn_name22 || $name22 || $position22 || $employee_id22) {
        if ($e_id22 == "Create New") {
            $employee_id22 = $_POST['txt_employee_id22'];
        } else {
            $employee_id22 = $_POST['employee_id22'];
        }
        $for_two  = $jpn_name22 . ',' . $name22 . ',' . $position22 . ',' . $employee_id22;
    }

    $jpn_name33 = $_POST['japan_name33'];
    $name33      = $_POST['name33'];
    $position33 = $_POST['position33'];
    $e_id33 = $_POST['employee_id33'];
    //$txt_employee_id1 = $_POST['$txt_employee_id1'];
    // if($e_id33 == "Create New"){
    //     $employee_id33 = $_POST['txt_employee_id33'];
    // }else{
    //     $employee_id33 = $_POST['employee_id33'];
    // }
    // $for_three  = $jpn_name33.','.$name33.','.$position33.','.$employee_id33;
    $for_three = "";
    $employee_id33 = "";
    if ($jpn_name33 || $name33 || $position33 || $employee_id33) {
        if ($e_id33 == "Create New") {
            $employee_id33 = $_POST['txt_employee_id33'];
        } else {
            $employee_id33 = $_POST['employee_id33'];
        }
        $for_three  = $jpn_name33 . ',' . $name33 . ',' . $position33 . ',' . $employee_id33;
    }

    $jpn_name44 = $_POST['japan_name44'];
    $name44      = $_POST['name44'];
    $position44 = $_POST['position44'];
    $e_id44 = $_POST['employee_id44'];
    //$txt_employee_id1 = $_POST['$txt_employee_id1'];
    // if($e_id44 == "Create New"){
    //     $employee_id44 = $_POST['txt_employee_id44'];
    // }else{
    //     $employee_id44 = $_POST['employee_id44'];
    // }
    // $for_four  = $jpn_name44.','.$name44.','.$position44.','.$employee_id44;
    $for_four = "";
    $employee_id44 = "";
    if ($jpn_name44 || $name44 || $position44 || $employee_id44) {
        if ($e_id44 == "Create New") {
            $employee_id44 = $_POST['txt_employee_id44'];
        } else {
            $employee_id44 = $_POST['employee_id44'];
        }
        $for_four  = $jpn_name44 . ',' . $name44 . ',' . $position44 . ',' . $employee_id44;
    }

    $jpn_name55 = $_POST['japan_name55'];
    $name55      = $_POST['name55'];
    $position55 = $_POST['position55'];
    $e_id55 = $_POST['employee_id55'];
    //$txt_employee_id1 = $_POST['$txt_employee_id1'];
    // if($e_id55 == "Create New"){
    //     $employee_id55 = $_POST['txt_employee_id55'];
    // }else{
    //     $employee_id55 = $_POST['employee_id55'];
    // }
    // $for_five  = $jpn_name55.','.$name55.','.$position55.','.$employee_id55;
    $for_five = "";
    $employee_id55 = "";
    if ($jpn_name55 || $name55 || $position55 || $employee_id55) {
        if ($e_id55 == "Create New") {
            $employee_id55 = $_POST['txt_employee_id55'];
        } else {
            $employee_id55 = $_POST['employee_id55'];
        }
        $for_five  = $jpn_name55 . ',' . $name55 . ',' . $position55 . ',' . $employee_id55;
    }

    $jpn_name66 = $_POST['japan_name66'];
    $name66      = $_POST['name66'];
    $position66 = $_POST['position66'];
    $e_id66 = $_POST['employee_id66'];
    //$txt_employee_id1 = $_POST['$txt_employee_id1'];
    // if($e_id66 == "Create New"){
    //     $employee_id66 = $_POST['txt_employee_id66'];
    // }else{
    //     $employee_id66 = $_POST['employee_id66'];
    // }
    // $for_six  = $jpn_name66.','.$name66.','.$position66.','.$employee_id66;
    $for_six = "";
    $employee_id66 = "";
    if ($jpn_name66 || $name66 || $position66 || $employee_id66) {
        if ($e_id66 == "Create New") {
            $employee_id66 = $_POST['txt_employee_id66'];
        } else {
            $employee_id66 = $_POST['employee_id66'];
        }
        $for_six  = $jpn_name66 . ',' . $name66 . ',' . $position66 . ',' . $employee_id66;
    }

    $jpn_name77 = $_POST['japan_name77'];
    $name77      = $_POST['name77'];
    $position77 = $_POST['position77'];
    $e_id77 = $_POST['employee_id77'];
    //$txt_employee_id1 = $_POST['$txt_employee_id1'];
    // if($e_id77 == "Create New"){
    //     $employee_id77 = $_POST['txt_employee_id77'];
    // }else{
    //     $employee_id77 = $_POST['employee_id77'];
    // }
    // $for_seven  = $jpn_name77.','.$name77.','.$position77.','.$employee_id77;
    $for_seven = "";
    $employee_id77 = "";
    if ($jpn_name77 || $name77 || $position77 || $employee_id77) {
        if ($e_id77 == "Create New") {
            $employee_id77 = $_POST['txt_employee_id77'];
        } else {
            $employee_id77 = $_POST['employee_id77'];
        }
        $for_seven  = $jpn_name77 . ',' . $name77 . ',' . $position77 . ',' . $employee_id77;
    }

    $jpn_name88 = $_POST['japan_name88'];
    $name88      = $_POST['name88'];
    $position88 = $_POST['position88'];
    $e_id88 = $_POST['employee_id88'];
    //$txt_employee_id1 = $_POST['$txt_employee_id1'];
    // if($e_id88 == "Create New"){
    //     $employee_id88 = $_POST['txt_employee_id88'];
    // }else{
    //     $employee_id88 = $_POST['employee_id88'];
    // }
    // $for_eight  = $jpn_name88.','.$name88.','.$position88.','.$employee_id88;
    $for_eight = "";
    $employee_id88 = "";
    if ($jpn_name88 || $name88 || $position88 || $employee_id88) {
        if ($e_id88 == "Create New") {
            $employee_id88 = $_POST['txt_employee_id88'];
        } else {
            $employee_id88 = $_POST['employee_id88'];
        }
        $for_eight  = $jpn_name88 . ',' . $name88 . ',' . $position88 . ',' . $employee_id88;
    }


    // $data_arr = array($for_one,$for_two,$for_three,$for_four,$for_five,$for_six,$for_seven,$for_eight);

    $variables = array($for_one, $for_two, $for_three, $for_four, $for_five, $for_six, $for_seven, $for_eight);
    $data_arr = array();

    foreach ($variables as $variable) {
        if ($variable) {
            $data_arr[] = $variable;
        }
    }
    var_dump($data_arr);
    if (file_exists($filename)) {
        $e_data = file($filename);
        $e_data_ary = array();
        foreach ($e_data as $key => $e_d) {
            $each = explode(',', $e_d);
            $e_data_ary[$key] = $each;
        }


        $e_format_ary = array();
        foreach ($e_data_ary as $e_ary) {
            foreach ($e_ary as $a) {
                $e_format_ary[$e_ary[3]] = $e_ary;
            }
        }

        $employee_id = array();
        $count = 0;
        foreach ($e_format_ary as $f_key => $f_ary) {

            $employee_id[$count] = preg_replace('/\s+/', '', $f_key);
            $count++;
        }

        foreach ($e_data as $line_num => $e_d) {
            $new_parts = explode(',', $e_d);
            $file_e_id = preg_replace('/\s+/', '', $new_parts[3]);
            switch ($file_e_id) {
                case $employee_id11:
                    $new_parts[0] = $jpn_name11;
                    $new_parts[1] = $name11;
                    $new_parts[2] = $position11;
                    $e_data[$line_num] = implode(',', $new_parts);
                    $UpdatedContents = implode("", $e_data);
                    file_put_contents($filename, $UpdatedContents);
                    break;

                case $employee_id22:
                    $new_parts[0] = $jpn_name22;
                    $new_parts[1] = $name22;
                    $new_parts[2] = $position22;
                    $e_data[$line_num] = implode(',', $new_parts);
                    $UpdatedContents = implode("", $e_data);
                    file_put_contents($filename, $UpdatedContents);
                    break;

                case $employee_id33:
                    $new_parts[0] = $jpn_name33;
                    $new_parts[1] = $name33;
                    $new_parts[2] = $position33;
                    $e_data[$line_num] = implode(',', $new_parts);
                    $UpdatedContents = implode("", $e_data);
                    file_put_contents($filename, $UpdatedContents);
                    break;

                case $employee_id44:
                    $new_parts[0] = $jpn_name44;
                    $new_parts[1] = $name44;
                    $new_parts[2] = $position44;
                    $e_data[$line_num] = implode(',', $new_parts);
                    $UpdatedContents = implode("", $e_data);
                    file_put_contents($filename, $UpdatedContents);
                    break;

                case $employee_id55:
                    $new_parts[0] = $jpn_name55;
                    $new_parts[1] = $name55;
                    $new_parts[2] = $position55;
                    $e_data[$line_num] = implode(',', $new_parts);
                    $UpdatedContents = implode("", $e_data);
                    file_put_contents($filename, $UpdatedContents);
                    break;

                case $employee_id66:
                    $new_parts[0] = $jpn_name66;
                    $new_parts[1] = $name66;
                    $new_parts[2] = $position66;
                    $e_data[$line_num] = implode(',', $new_parts);
                    $UpdatedContents = implode("", $e_data);
                    file_put_contents($filename, $UpdatedContents);
                    break;

                case $employee_id77:
                    $new_parts[0] = $jpn_name77;
                    $new_parts[1] = $name77;
                    $new_parts[2] = $position77;
                    $e_data[$line_num] = implode(',', $new_parts);
                    $UpdatedContents = implode("", $e_data);
                    file_put_contents($filename, $UpdatedContents);
                    break;

                case $employee_id88:
                    $new_parts[0] = $jpn_name88;
                    $new_parts[1] = $name88;
                    $new_parts[2] = $position88;
                    $e_data[$line_num] = implode(',', $new_parts);
                    $UpdatedContents = implode("", $e_data);
                    file_put_contents($filename, $UpdatedContents);
                    break;
            }
        }
        if (!in_array($employee_id11, $employee_id) && $employee_id11 != "") {
            $current = file_get_contents($filename);
            $current .=  "\r\n". $for_one ;

            file_put_contents($filename, $current);
        }
        if (!in_array($employee_id22, $employee_id) && $employee_id22 != "") {
            $current = file_get_contents($filename);
            $current .= "\r\n".$for_two ;

            file_put_contents($filename, $current);
        }
        if (!in_array($employee_id33, $employee_id) && $employee_id33 != "") {
            $current = file_get_contents($filename);
            $current .="\r\n". $for_three;

            file_put_contents($filename, $current);
        }
        if (!in_array($employee_id44, $employee_id) && $employee_id44 != "") {
            $current = file_get_contents($filename);
            $current .= "\r\n".$for_four;

            file_put_contents($filename, $current);
        }
        if (!in_array($employee_id55, $employee_id) && $employee_id55 != "") {
            $current = file_get_contents($filename);
            $current .= "\r\n". $for_five;

            file_put_contents($filename, $current);
        }
        if (!in_array($employee_id66, $employee_id) && $employee_id66 != "") {
            $current = file_get_contents($filename);
            $current .= "\r\n".$for_six;

            file_put_contents($filename, $current);
        }
        if (!in_array($employee_id77, $employee_id) && $employee_id77 != "") {
            $current = file_get_contents($filename);
            $current .= "\r\n". $for_seven;

            file_put_contents($filename, $current);
        }
        if (!in_array($employee_id88, $employee_id)  && $employee_id88 != "") {
            $current = file_get_contents($filename);
            $current .= "\r\n".$for_eight;

            file_put_contents($filename, $current);
        }
    } else {
        $data = $for_one . "\r\n" . $for_two . "\r\n" . $for_three . "\r\n" . $for_four . "\r\n" . $for_five . "\r\n" . $for_six . "\r\n" . $for_seven . "\r\n" . $for_eight;
        file_put_contents($filename, $data);
        chmod($filename, 0777);
    }
}

//var_dump($form_data);






echo "<h1>Success</h1>";
