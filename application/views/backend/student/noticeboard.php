<div class="row">
    <div class="col-md-12">

        <!------CONTROL TABS START------->
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                    <?php echo get_phrase('noticeboard_list'); ?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------->


        <div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            <th><div>#</div></th>
                    <th><div><?php echo get_phrase('title'); ?></div></th>
                    <th><div><?php echo get_phrase('notice'); ?></div></th>
                    <th><div><?php echo get_phrase('date'); ?></div></th>
                    <th><div></div></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($notices as $row):
                            ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['notice_title']; ?></td>
                                <td class="span5"><?php echo $row['notice']; ?></td>
                                <td><?php echo date('d M,Y', $row['create_timestamp']); ?></td>
                                <td>
                                    <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_view_notice/<?php echo $row['notice_id']; ?>');"
                                       class="btn btn-default">
                                        <?php echo get_phrase('view_notice'); ?>
                                    </a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->




        </div>
    </div>
</div>