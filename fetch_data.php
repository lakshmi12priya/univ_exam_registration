<?php
// include 'header.php';
        // #$_SESSION['name'] = $name;
        // $regnoquery = "SELECT regno FROM u_student where sname = 'ARAVIND R'";
        // $regno = mysqli_query($conn, $regnoquery);

        // foreach($regno as $studentRegno)
        // {
        //     $_SESSION['regno'] = $studentRegno['regno'];
        // }
                    // echo($_POST['regno']);
            
            $namequery = "SELECT sname FROM u_student where regno = '$_POST[regno]'";
            $name = mysqli_query($conn, $namequery);
            $y = mysqli_fetch_assoc($name);
            $_SESSION['name'] = $y['sname'];

            $prgmquery = "SELECT prgm_name from u_prgm inner join u_student on u_student.prgm_id=u_prgm.prgm_id where regno= '$_POST[regno]'";
            $prgm = mysqli_query($conn, $prgmquery);
            
            $w= mysqli_fetch_assoc($prgm);
            // foreach ($prgm as $studentprgm) 
            // {
                $_SESSION['prgm'] = $w['prgm_name'];
            // }
            $deptquery = "SELECT dept_name from u_dept inner join u_prgm on u_dept.dept_id=u_prgm.dept_id inner join u_student on u_student.prgm_id=u_prgm.prgm_id where regno='$_POST[regno]' ";
            $dept = mysqli_query($conn, $deptquery);
            
            $z= mysqli_fetch_assoc($dept);
            $_SESSION['dept'] = $z['dept_name'];
            
            
            $subjectquery = "SELECT u_course_regn.course_code,course_name,course_type from u_course_regn inner join u_course on u_course_regn.course_code=u_course.course_code where regno='$_POST[regno]'";
            $subject = mysqli_query($conn, $subjectquery);   
            foreach($subject as $x){
                if($x['course_type']=='TY'){
                    $x['course_type'] = 'Theory';
                }
                if($x['course_type']=='LB'){
                    $x['course_type'] = 'Laboratory';
                }
                if($x['course_type']=='MC'){
                    $x['course_type'] = 'Mandatory Course';
                }
                if($x['course_type']=='TY'){
                    $x['course_type'] = 'Theory';
                }
            }
        
?>