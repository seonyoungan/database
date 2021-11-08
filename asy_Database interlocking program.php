<html>
    <head>
        <meta charset = "UTF-8">
        <title>사용자등록 종료</title>
        <style type = "text/css">
        div{text-align:center;}
        mso-number-format:\"\@\";
        </style> 
    </head>

    <body>
        <div>
        <?php
            $mid = $_POST['mid'];
            $mpass = $_POST['mpass'];
            $mname = $_POST['mname'];
                $conn = mysqli_connect('localhost','root','111111','homework1');
                $sql = "insert into member(mindex,mid,mpass,mname)";
                $sql = $sql."values(3,'$mid','$mpass','$mname')";
                $result = mysqli_query($conn, $sql);


            $result = mysqli_query($conn, "select * from member where mid = '$mid' ORDER BY mindex DESC");
           
                if($result == false){
                    echo mysqli_error($conn);
                } 

                echo "<p style= 'background-color:lightgrey'><b>사용자등록 종료 - ".$mid."</b></p>";
                echo "<p> 아래와 같은 정보를 가진 사용자로 등록되었습니다. 비밀번호와 아이디는 반드시
                기억하여 주시기 바랍니다. 아이디와 비밀번호 분실시 검색은 거의 불가능합니다. ^^;;
                등록후 정보 변경은 로그인을 하신 후 변경하시기 바랍니다.<br><br></p>";

                while ($row = mysqli_fetch_array($result)){
                    echo "사용자ID : ".$row['mid']."<br>\n";
                    echo "사용자명 : ".$row['mname']."<br>\n";
                    echo "비밀번호 : ".$row['mpass']."<br>\n";
                }

                echo "<p style= 'background-color:lightgrey;'><b>&nbsp;</b></p>";
                echo "<a href = 'asy.html'> 로그인 </a>";            
            mysqli_free_result($result);
            mysqli_close($conn);
                
        ?>
        </div>
    </body>
</html>