<?php

if($logs){
    echo'

        <table class="table table-bordered table-condensed table-hover log">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>ROLE</th>
                                            <th>DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                    $counter=1;
                                    foreach ($logs as $log) {
                                        echo"
                                            <tr>
                                                <td>$counter</td>
                                                <td>$log->NAME</td>
                                                <td>$log->ROLE</td>
                                                <td>".date('F d Y h:i:s', $log->TIME_LOGGED)."</td>
                                                
                                            </tr>
                                        ";
                                        $counter++;
                                    }

                                    
                                        
                                    echo'</tbody>
                                </table>



    ';
}



?>