<table class="table table-bordered table-striped datatable" id="table_export">
    <thead>
        <tr>
            <th style="width: 60px;">#</th>
            <th><?php echo get_phrase('title');?></th>
            <th><?php echo get_phrase('class');?></th>
            <th><?php echo get_phrase('exam');?></th>
            <th><?php echo get_phrase('teacher');?></th>
            <th><?php echo get_phrase('options');?></th>
        </tr>
    </thead>

    <tbody>
        <?php
        $count = 1;
        $this->db->order_by('question_paper_id', 'desc');
        $question_papers = $this->db->get('question_paper')->result_array();
        foreach ($question_papers as $row) { ?>   
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $row['title']?></td>
                <td>
                    <?php echo $this->db->get_where('class', array('class_id' => $row['class_id']))->row()->name; ?>
                </td>
                <td>
                    <?php echo $this->db->get_where('exam', array('exam_id' => $row['exam_id']))->row()->name; ?>
                </td>
                <td>
                    <?php echo $this->db->get_where('teacher', array('teacher_id' => $row['teacher_id']))->row()->name; ?>
                </td>
                <td>
                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/question_paper_view/<?php echo $row['question_paper_id']; ?>');"
                        class="btn btn-default btn-sm btn-icon icon-left">
                            <i class="entypo-eye"></i>
                            <?php echo get_phrase('view_question_paper');?>
                    </a>
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