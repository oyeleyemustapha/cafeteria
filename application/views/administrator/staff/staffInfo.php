<?php

if($staff){
    echo'
    <form method="post" id="updateStaffForm">
    <input type="hidden" name="staff_id" value="'.$staff->STAFF_ID.'">
                                                           <div class="form-group">
                                                               <input type="text" name="name" class="form-control" placeholder="Staff Name" required="" value="'.$staff->NAME.'">
                                                           </div>

                                                            <div class="form-group">
                                                               <select name="role" class="form-control" required="">
                                                                <option value="'.$staff->ROLE.'">'.$staff->ROLE.'</option>
                                                                   <option value="">Choose Role</option>
                                                                   <option value="Administrator">Administrator</option>
                                                                   <option value="Supervisor">Supervisor</option>
                                                                   <option value="Cashier">Cashier</option>
                                                                   <option value="Stock Manager">Stock Manager</option>
                                                               </select>
                                                           </div>

                                                           <div class="form-group">
                                                               <input type="text" name="username" class="form-control" placeholder="Username" required="" value="'.$staff->USERNAME.'">
                                                           </div>

                                                            <div class="form-group">
                                                               <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                                           </div>
                                                           <div class="form-group">
                                                               <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required="">
                                                           </div>

                                                           <button class="btn btn-danger">Update</button>
                                                       </form>
       
    ';
}



?>