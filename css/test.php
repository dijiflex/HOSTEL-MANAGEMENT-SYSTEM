<?php

foreach ($allocaredStds as $allocaredStd) {
                                                echo '
                                                <tr>
                                                    <th scope="row">'.$allocaredStd['std_id'].'</th>
                                                    <td>'.$allocaredStd['std_fname'].' '.$allocaredStd['std_lname'].'</td>
                                                    <td>'.$allocaredStd['std_email'].'</td>
                                                    <td>'.$allocaredStd['rm_no'].'</td>
                                                    <td>'.$allocaredStd['fk_rm_type_name'].'</td>
                                                </tr>';
                                            }
//this is the comment
                                        ?>