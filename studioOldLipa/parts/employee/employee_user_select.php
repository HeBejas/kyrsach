<?php
    include('../server/connect.php');
    $link = mysqli_connect($db_server, $db_user, $db_password, $db_name); 

    $query = "SELECT * FROM user WHERE user_role = 'Сотрудник' ";	
    $result = mysqli_query($link, $query);
    echo"<table class='remont_ne_oform-table'>
    <thead>
        <tr>
            <th>Логин</th>
            <th>Фио</th>
            <th>Телефон</th>
        </tr>
    </thead>
    <tbody>";

    while ($row = $result->fetch_assoc()) {
        echo"
            <tr class='ne_oform_content_tr'> 
                <td>$row[user_login]          </td>
                <td>$row[user_name] $row[user_secondname] $row[user_patronymic]</td>
                <td>$row[user_phone]       </td>
            </tr>
        ";
    }
    echo"
    </tbody>
    </table>";
mysqli_close($link);
?>
<script>
    SelectService="";
    $('.ne_oform_content_tr').click(function(){
        $('#employee_user_select-btns-confirm').removeClass('dead');
        if(SelectService != ""){
            SelectService.removeClass('position_select');

            selected_employee = $(this).find('td')[0].textContent;
            // console.log(selected_employee);
            $(this).addClass('position_select');
            SelectService = $(this);
        }else{

            selected_employee = $(this).find('td')[0].textContent;
            // console.log(selected_employee);

            $(this).addClass('position_select');
            SelectService = $(this);
        }
    });
</script>

