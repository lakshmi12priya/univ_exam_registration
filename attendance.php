<?php
    include 'header.php';
    $regno_q = "SELECT  distinct regno from u_course_regn ";
    $regno = mysqli_query($conn, $regno_q);
    foreach($regno as $r)
    {
        // print_r($r);
        $attendance_query = "SELECT session,round(avg(attendance)) as con_attendance from u_course_regn where regno='$r[regno]'";
        $con_attendance = mysqli_query($conn, $attendance_query);
        foreach($con_attendance as $a){
            $_SESSION['regno'] = $r['regno'];
            $_SESSION['session'] = $a['session'];
            $_SESSION['con_attendance'] = $a['con_attendance'];
            // echo "$_SESSION[regno]";
            // echo "$_SESSION[session]";
            // echo "$_SESSION[con_attendance]";
        }
        $att_entry_query = "INSERT into u_exam_regn(regno,session,consolidated_attendance) values('$_SESSION[regno]','$_SESSION[session]','$_SESSION[con_attendance]')";
        $att_entry = mysqli_query($conn, $att_entry_query);
        if($att_entry)
        {
            echo "Success";
        }
        else
        {
            echo "Error";
        }
    }
?>
