<html>
<?php
include 'conn.php';
if($_POST['sub'])
{
    $name=$_POST['bname'];
    $q="select * from book where title='$name'";
    $r=mysqli_query($con,$q);
    
    {
        echo "<table> 
        <tr>
        <th>title</title><th>author</th><th>price</th><th>no of pages</th>

        </tr>
        <tr>";
        while($t=mysqli_fetch_assoc($r))
        {
            echo "<tr>
            <td>{$t[title]}</td>
            <td>{$t[author]}</td>
            <td>{$t[price]}</td>
            <td>{$t[nopages]}</td></tr>";
        }
        echo "


        </table>";
    }

}
?>
</html>