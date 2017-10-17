<table class="table table-bordered table-striped datatable" id="table_export">
    <thead>
        <tr>
            <th style="width: 60px;">#</th>
            <th><?php echo get_phrase('requested_book');?></th>
            <th><?php echo get_phrase('requested_by');?></th>
            <th><?php echo get_phrase('issue_starting_date');?></th>
            <th><?php echo get_phrase('issue_ending_date');?></th>
            <th><?php echo get_phrase('request_status');?></th>
            <th><?php echo get_phrase('options');?></th>
        </tr>
    </thead>

    <tbody>
        <?php
        $count = 1;
        $this->db->order_by('book_request_id', 'desc');
        $book_requests = $this->db->get('book_request')->result_array();
        foreach ($book_requests as $row) { ?>   
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $this->db->get_where('book', array('book_id' => $row['book_id']))->row()->name; ?></td>
                <td><?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?></td>
                <td><?php echo date('d/m/Y', $row['issue_start_date']); ?></td>
                <td><?php echo date('d/m/Y', $row['issue_end_date']); ?></td>
                <td>
                    <?php
                        if($row['status'] == 0)
                            $status = '<span class="label label-info" style="font-size: 10px;">' . get_phrase('pending') . '</span>';
                        else if($row['status'] == 1)
                            $status = '<span class="label label-success" style="font-size: 10px;">' . get_phrase('issued') . '</span>';
                        else
                            $status = '<span class="label label-danger" style="font-size: 10px;">' . get_phrase('rejected') . '</span>';
                        echo $status;
                    ?>
                </td>
                <td>
                    <?php if($row['status'] == 0) { ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                <li>
                                    <a href="<?php echo base_url();?>index.php?librarian/book_request/accept/<?php echo $row['book_request_id'];?>">
                                        <i class="entypo-check"></i>
                                        <?php echo get_phrase('accept');?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>index.php?librarian/book_request/reject/<?php echo $row['book_request_id'];?>">
                                        <i class="entypo-cancel"></i>
                                        <?php echo get_phrase('reject');?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <?php } else echo get_phrase('no_actions_available'); ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!-- DATA TABLE EXPORT CONFIGURATIONS -->                      
<script type="text/javascript">

    jQuery(document).ready(function($)
    {
        var datatable = $("#table_export").dataTable({
            "sPaginationType": "bootstrap"
        });
        
        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
        
</script>