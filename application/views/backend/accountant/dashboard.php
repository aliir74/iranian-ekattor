<?php
$unpaid_invoices = $this->db->get_where('invoice', array('year' => $running_year, 'status' => 'unpaid'))->num_rows();

$total_income = 0;
$payments = $this->db->get_where('payment', array('year' => $running_year, 'payment_type' => 'income'))->result_array();
foreach($payments as $row)
	$total_income += $row['amount'];

$total_expense = 0;
$payments = $this->db->get_where('payment', array('year' => $running_year, 'payment_type' => 'expense'))->result_array();
foreach($payments as $row)
	$total_expense += $row['amount'];
?>

<hr />

<div class="row">
    
    <div class="col-md-4">
    
        <div class="tile-stats tile-red">
            <div class="icon" style="margin-bottom: 20px;"><i class="fa fa-credit-card" style="padding-right: 10px;"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $unpaid_invoices; ?>" 
            		data-postfix="" data-duration="1500" data-delay="0">0</div>
            
            <h3><?php echo get_phrase('unpaid_invoices');?></h3>
        </div>
        
    </div>

    <div class="col-md-4">
    
        <div class="tile-stats tile-green">
            <div class="icon" style="margin-bottom: 20px;"><i class="fa fa-money" style="padding-right: 10px;"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $total_income; ?>" 
            		data-postfix="" data-duration="800" data-delay="0">0</div>
            
            <h3><?php echo get_phrase('total_income'); ?></h3>
        </div>
        
    </div>

    <div class="col-md-4">
    
        <div class="tile-stats tile-aqua">
            <div class="icon" style="margin-bottom: 20px;"><i class="fa fa-tags" style="padding-right: 10px;"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $total_expense; ?>" 
            		data-postfix="" data-duration="500" data-delay="0">0</div>
            
            <h3><?php echo get_phrase('total_expense');?></h3>
        </div>
        
    </div>
	
</div>

  












