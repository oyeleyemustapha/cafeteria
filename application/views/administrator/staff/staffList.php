<?php

if($staff_list){
    echo'

        <table class="table table-bordered table-condensed table-hover staffList">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>USERNAME</th>
                                            <th>ROLE</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    $counter=1;
                                    foreach ($staff_list as $staff) {
                                        echo"
                                            <tr>
                                                <td>$counter</td>
                                                <td>$staff->NAME</td>
                                                <td>$staff->USERNAME</td>
                                                <td>$staff->ROLE</td>
                                                <td>
                                                    <button class='btn btn-info btn-sm editStaff' id='$staff->STAFF_ID'>Edit</button>
                                                    <button class='btn btn-danger btn-sm deleteStaff' id='$staff->STAFF_ID' >Delete</button>

                                                </td>
                                            </tr>
                                        ";
                                        $counter++;
                                    }

                                    
                                        
                                    echo'</tbody>
                                </table>



    ';
}



?>