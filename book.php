<html>
    <body>
        <form action="search.php" method="post">
            <input type="text" name="bname">
            <input type="submit" value="search" name="sub">
        </form>
      
            <?php
            $q="select * from book ";
            $r=mysqli_query($con,$q);
            
           
            echo "<table border=1> 
            <tr>
            <th>title</title><th>author</th><th>price</th><th>no of pages</th>
        
            </tr>
            <tr>";
            while($t=mysqli_fetch_assoc($r))
            {
                echo "<tr>
                <td>{$t['title']}</td>
                <td>{$t['author']}</td>
                <td>{$t['price']}</td>
                <td>{$t['nopages']}</td></tr>";
            }
                echo "
        
        
                </table>";

            ?>

    </body>
</html>