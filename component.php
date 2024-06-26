<?php
include "dbconn1.php";

function component($ser_name,$duration, $price, $ser_id){
    
    
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"services.php\" method=\"post\">
                    <div class=\"card shadow\">
                       
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$ser_name</h5>
                            <h6>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"far fa-star\"></i>
                            </h6>
                         
                            <h5>
                                <small><s class=\"text-secondary\">Rs4000</s></small>
                                <span class=\"price\">Rs$price</span>
                            </h5>
                            <h5>
                          
                            <span class=\"duration\">Duration:$duration</span>
                        </h5>
                        

                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='ser_id' value='$ser_id'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}

function cartElement($ccid,$ser_id,$ser_name, $price){
    $element = "
    
    <form  method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$ser_name</h5>
                              
                                <h5 class=\"pt-2\">Rs$price</h5>
                          
                              
                                <a href=\"remove.php?id=$ser_id&ccid=$ccid\"> 
                                <button type=\"button\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button></a>
                            </div>
                           <div class=\"col-md-3 py-5\">
                                <div =\"col-md-6\">
                           
                                </div> 
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
          /* <?php
          <option value=""></option>
                                <select name="time_from" class="custom-select select2" id="time_from">
                                <?php
                                    $qr = $conn->query("SELECT time_from FROM tbl_schedule ");
                                    while($r= $qr->fetch_assoc()):
                                ?>
                                <option value="<?php echo $r['time_from'] ?>" 'selected' : '' ?></option>
                                <?php endwhile; ?>
                            </select> */
}

















