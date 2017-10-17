<?php 
$question_paper = $this->db->get_where('question_paper', array('question_paper_id' => $param2))->result_array();
foreach ($question_paper as $row) { ?>
    
    <div class="col-md-12">
        
        <div class="panel panel-primary" data-collapsed="0">
                
            <div class="panel-heading">
                <div class="panel-title"><?php echo get_phrase('question_paper_details');?></div>
            </div>
            
            <div id="qp_print">
                <div class="panel-body">
                    
                    <p>
                        <?php echo $row['question_paper']; ?>
                    </p>

                </div>
            </div>
            
        </div>

        <a onClick="PrintElem('#qp_print')" class="btn btn-primary btn-icon icon-left hidden-print">
            <?php echo get_phrase('print_question_paper'); ?>
            <i class="entypo-doc-text"></i>
        </a>
        <br><br>

    </div>

<?php } ?>

<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'Question Paper', 'height=400,width=600');
        mywindow.document.write('<html><head><title><?php echo $row['title']; ?></title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>


















